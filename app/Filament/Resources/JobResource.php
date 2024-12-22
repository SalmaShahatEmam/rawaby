<?php

namespace App\Filament\Resources;

use App\Models\Job;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\JobResource\Pages;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JobResource\RelationManagers;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Jobs and Job Applications');
    }

    public static function getModelLabel(): string
    {
        return __('Job');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Jobs');
    }
    public static function form(Form $form): Form
    {

        return $form
        ->schema([
            TextInput::make('title_ar')
                ->label(__('title in arabic'))
                ->required()
                ->autofocus(),

                TextInput::make('title_en')
                ->required()
                ->label(__('title_en'))
                ->minLength(3)
                ->maxLength(255)
                ->unique(Job::class, 'title_en', ignoreRecord: true)

                ->autofocus()
                ->lazy()
                ->afterStateUpdated(function (Set $set, ?string $state) {
                    $set('slug', str()->slug($state));
                }),
            TextInput::make('slug')
                ->required()

                ->unique(Job::class, 'slug', ignoreRecord: true)
                ->disabled()
                ->dehydrated(),

                TextInput::make('section_ar')
                ->label(__('section in arabic'))
                ->required(),

                TextInput::make('section_en')
                ->label(__('section in english'))
                ->required(),



                TextInput::make('hours')
                ->label(__('hours in arabic'))
                ->required()
               // ->numeric()

                ->columnSpan('full'),



            TextInput::make('expertise_ar')
                ->label(__('expertise in arabic'))
                ->required(),


            TextInput::make('expertise_en')
                ->label(__('expertise in english'))
                ->required(),


                TextInput::make('work_type_ar')
                ->label(__('work type in arabic'))
                ->required(),
                TextInput::make('work_type_en')
                ->label(__('work type in english'))
                ->required(),

                MarkdownEditor::make('core_tasks_ar')
                ->label(__('core tasks in arabic'))
                ->required(),

                MarkdownEditor::make('core_tasks_en')
                ->label(__('core tasks in english'))
                ->required(),

                MarkdownEditor::make('required_skills_ar')
                ->label(__('required skills in arabic'))
                ->required(),

                MarkdownEditor::make('required_skills_en')
                ->label(__('required skills in english'))
                ->required(),
                MarkdownEditor::make('advantages_ar')
                ->label(__('advantages in arabic'))
                ->required(),

                MarkdownEditor::make('advantages_en')
                ->label(__('advantages in english'))
                ->required(),




        ])
        ->columns(2);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('title_'.app()->getLocale())
            ->label(__('job title')),
            TextColumn::make('section_'.app()->getLocale())
            ->label(__('section')),
            TextColumn::make('hours')
            ->label(__('job hours')),
            TextColumn::make('expertise_'.app()->getLocale())
            ->label(__('expertise')),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobs::route('/'),
            'create' => Pages\CreateJob::route('/create'),
            'edit' => Pages\EditJob::route('/{record}/edit'),
        ];
    }
}
