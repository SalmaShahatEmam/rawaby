<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\ProjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectResource\RelationManagers;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Projects');
    }
    public static function getModelLabel(): string
    {
        return __('Project');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Projects');
    }

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Grid::make()->schema([
                Section::make(__('Project Information'))
                    ->description(__('This is the main information about the Project.'))
                    ->collapsible(true)
                    ->schema([
                        TextInput::make('name_ar')
                            ->label(__('name_ar'))
                            ->minLength(3)
                            ->maxLength(255)

                            ->required(),

                        TextInput::make('name_en')
                            ->required()
                            ->label(__('name_en'))
                            ->minLength(3)
                            ->maxLength(255)

                            ->autofocus()
                            ->lazy()
                            ->afterStateUpdated(function (Set $set, ?string $state) {
                                $set('slug', str()->slug($state));
                            }),
                        TextInput::make('slug')
                            ->required()

                            ->unique(Project::class, 'slug', ignoreRecord: true)
                            ->disabled()
                            ->dehydrated(),
                            TextInput::make('power')
                            ->label(__('production power'))
                            ->minLength(3)
                            ->maxLength(255)

                            ->required(),
                            TextInput::make('time')
                            ->label(__('release time'))
                            ->minLength(3)
                            ->maxLength(255)

                            ->required(),

                            TextInput::make('address')
                            ->label(__('Address'))
                            ->minLength(3)
                            ->maxLength(255)

                            ->required(),
                    ])->columns(3),


                Section::make(__('Description Information'))
                    ->description(__('This is the description information about the Project.'))
                    ->collapsible(true)

                    ->schema([

                        RichEditor::make('desc_ar')
                            ->label(__('desc_ar'))
                            ->minLength(3)

                            ->columnSpan(3)
                            ->required(),


                        RichEditor::make('desc_en')
                            ->label(__('desc_en'))
                            ->minLength(3)

                            ->columnSpan(3)
                            ->required(),

                    ]),

                Section::make(__('Images Information'))
                    ->description(__('This is the image information about the Project.'))
                    ->collapsible(true)

                    ->schema([



                        FileUpload::make('image')
                            ->label(__('image'))
                            ->disk('public')->directory('projects')
                            ->columnSpanFull()
                            ->preserveFilenames()
                            ->reorderable()

                            ->required(),
                    ]),


                    Section::make(__('Products'))
                    ->description(__('This is the Products information about the Projects.'))
                    ->collapsible(true)
                    ->schema([
                        MarkdownEditor::make('products_ar')
                            ->label(__('Products in arabic'))
                            ->required()
                            ->columnSpan(1),
                        MarkdownEditor::make('products_en')
                            ->label(__('Products in english'))
                            ->required()->columnSpan(1),


                    ]),

                    Section::make(__('Features'))
                    ->description(__('This is the Features information about the Projects.'))
                    ->collapsible(true)
                    ->schema([
                        MarkdownEditor::make('feature_ar')
                            ->label(__('Features in arabic'))
                            ->required()
                            ->columnSpan(1),
                        MarkdownEditor::make('feature_en')
                            ->label(__('Features in english'))
                            ->required()->columnSpan(1),


                    ]),


                    Section::make(__('Targets'))
                    ->description(__('This is the Targets information about the Projects.'))
                    ->collapsible(true)
                    ->schema([
                        MarkdownEditor::make('targets_ar')
                            ->label(__('Targets in arabic'))
                            ->required()
                            ->columnSpan(1),
                        MarkdownEditor::make('targets_en')
                            ->label(__('Targets in english'))
                            ->required()->columnSpan(1),


                    ]),

            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                ->label(__('image'))
                ->circular(),
            TextColumn::make('name_' . app()->getLocale())
                ->searchable()
                ->label(__('name_' . app()->getLocale())),

            TextColumn::make('desc_' . app()->getLocale())
                ->searchable()
                ->label(__('desc_' . app()->getLocale()))
                ->wrap()
                ->html()
                ->words(50),
            ])
            ->filters([
               
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
