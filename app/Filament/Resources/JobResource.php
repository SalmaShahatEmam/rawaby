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
                    ->autofocus()
                    ->maxLength(255) // Sets the maximum character limit
                ,

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
                    ->columnSpan('full')

                    ->unique(Job::class, 'slug', ignoreRecord: true)
                    ->disabled()
                    ->dehydrated(),

                TextInput::make('section_ar')
                    ->label(__('section in arabic'))
                    ->required()
                    ->maxLength(255) // Sets the maximum character limit
                ,
                TextInput::make('section_en')
                    ->label(__('section in english'))
                    ->required()
                    ->maxLength(255) // Sets the maximum character limit
                ,
                TextInput::make('hours')
                    ->label(__('number of working hours per day'))
                    ->required()
                     ->numeric()
                    // ->max(24)
                    // ->min(1)
                  //  ->maxLength(255) // Sets the maximum character limit
                    ->columnSpan('full'),

                TextInput::make('expertise_ar')
                    ->label(__('expertise in arabic'))
                    ->required()
                    ->maxLength(255) // Sets the maximum character limit
                ,


                TextInput::make('expertise_en')
                    ->label(__('expertise in english'))
                    ->required()
                    ->maxLength(255) // Sets the maximum character limit
                ,


                TextInput::make('work_type_ar')
                    ->label(__('work type in arabic'))
                    ->required()
                    ->maxLength(255) // Sets the maximum character limit
                ,
                TextInput::make('work_type_en')
                    ->label(__('work type in english'))
                    ->required()
                    ->maxLength(255) // Sets the maximum character limit
                ,

                MarkdownEditor::make('core_tasks_ar')
                    ->disableToolbarButtons([
                        'attachFiles',
                        'codeBlock',
                        'table',
                        'italic',


                    ])
                    ->label(__('core tasks in arabic'))
                    ->required()
                    ->maxLength(255) // Sets the maximum character limit
                ,

                MarkdownEditor::make('core_tasks_en')
                    ->disableToolbarButtons([
                        'attachFiles',
                        'codeBlock',
                        'table',
                        'italic',


                    ])
                    ->disableToolbarButtons([
                        'attachFiles',
                        'codeBlock',
                        'table',
                        'italic',

                    ])
                    ->label(__('core tasks in english'))
                    ->required()
                    ->maxLength(255) // Sets the maximum character limit
                ,

                MarkdownEditor::make('required_skills_ar')
                    ->label(__('required skills in arabic'))
                    ->disableToolbarButtons([
                        'attachFiles',
                        'codeBlock',
                        'table',
                        'italic',


                    ])
                    ->required()
                    ->maxLength(255) // Sets the maximum character limit
                ,

                MarkdownEditor::make('required_skills_en')
                    ->label(__('required skills in english'))
                    ->disableToolbarButtons([
                        'attachFiles',
                        'codeBlock',
                        'table',
                        'italic',


                    ])
                    ->required()
                    ->maxLength(255) // Sets the maximum character limit
                ,
                MarkdownEditor::make('advantages_ar')
                    ->disableToolbarButtons([
                        'attachFiles',
                        'codeBlock',
                        'table',
                        'italic',
                    ])
                    ->label(__('advantages in arabic'))
                    ->required()
                    ->maxLength(255) // Sets the maximum character limit
                ,

                MarkdownEditor::make('advantages_en')
                    ->disableToolbarButtons([
                        'attachFiles',
                        'codeBlock',
                        'table',
                        'italic',

                    ])
                    ->label(__('advantages in english'))
                    ->required()
                    ->maxLength(255) // Sets the maximum character limit
                ,




            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return $query->latest('created_at');
            })
            ->columns([
                TextColumn::make('title_' . app()->getLocale())
                    ->label(__('job title')),
                TextColumn::make('section_' . app()->getLocale())
                    ->label(__('section')),
                TextColumn::make('hours')
                    ->label(__('job hours')),
                TextColumn::make('expertise_' . app()->getLocale())
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
    public static function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        // Return the query with ordering
        return parent::getTableQuery()->orderBy('created_at', 'desc');
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
