<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sector;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\TargetSector;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TargetSectorResource\Pages;
use App\Filament\Resources\TargetSectorResource\RelationManagers;

class TargetSectorResource extends Resource
{
    protected static ?string $model = Sector::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Services and Target Secors Data');
    }

    public static function getModelLabel(): string
    {
        return __('Target Sector');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Target Sectors');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make(__('Blog Information'))
                        ->description(__('This is the main information about the blog.'))
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
                                ->unique(Sector::class, 'slug', ignoreRecord: true)
                                ->disabled()
                                ->dehydrated(),
                        ])->columns(3),

                    Section::make(__('Description Information'))
                        ->description(__('This is the description information about the blog.'))
                        ->collapsible(true)
                        ->schema([
                            RichEditor::make('desc_ar')
                                ->label(__('desc_ar'))
                                ->minLength(3)
                                ->maxLength(1500)
                                ->columnSpan(3)
                                ->required()
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                    'table',
                                    'italic',


                                ])

                                ,

                            RichEditor::make('desc_en')
                                ->label(__('desc_en'))
                                ->minLength(3)
                                ->maxLength(1500)
                                ->columnSpan(3)
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                    'table',
                                    'italic',


                                ])
                                ->required(),
                        ]),

                    Section::make(__('Images Information'))
                        ->description(__('This is the images information about the blog.'))
                        ->collapsible(true)
                        ->schema([
                            FileUpload::make('image')
                                ->label(__('image'))
                                ->disk('public')->directory('targetSctor')
                                ->imagePreviewHeight(200)
                                ->preserveFilenames()
                                ->reorderable()
                                ->required(),
                        ]),
                ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
        ->modifyQueryUsing(function (Builder $query) {
            return $query->latest('created_at');
        })
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
            'index' => Pages\ListTargetSectors::route('/'),
            'create' => Pages\CreateTargetSector::route('/create'),
            'edit' => Pages\EditTargetSector::route('/{record}/edit'),
        ];
    }
}
