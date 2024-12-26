<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProductLine;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductLineResource\Pages;
use App\Filament\Resources\ProductLineResource\RelationManagers;

class ProductLineResource extends Resource
{
    protected static ?string $model = ProductLine::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Products and Product Lines Data');
    }
    public static function getModelLabel(): string
    {
        return __('Product Line');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Product Lines');
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

                                ->unique(ProductLine::class, 'slug', ignoreRecord: true)
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
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                    'table',
                                    'italic',


                                ])
                                ->columnSpan(3)
                                ->required(),


                            RichEditor::make('desc_en')
                                ->label(__('desc_en'))
                                ->minLength(3)
                                ->maxLength(1500)
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                    'table',
                                    'italic',


                                ])
                                ->columnSpan(3)
                                ->required(),

                        ]),

                    Section::make(__('Images Information'))
                        ->description(__('This is the images information about the blog.'))
                        ->collapsible(true)

                        ->schema([



                            FileUpload::make('image')
                                ->label(__('image'))
                                ->disk('public')->directory('blogs')
                                ->columnSpanFull()
                                ->preserveFilenames()
                                ->reorderable()

                                ->required(),
                        ]),


                    Section::make(__('Advantages'))
                        ->description(__('This is the Advantages information about the Product Line.'))
                        ->collapsible(true)
                        ->schema([
                            MarkdownEditor::make('advantages_ar')
                                ->label(__('advantages in arabic'))
                                ->required()
                                ->maxLength(1500)
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                    'table',
                                    'italic',


                                ])
                                ->columnSpan(1),
                            MarkdownEditor::make('advantages_en')
                                ->label(__('advantages in english'))
                                ->required()->columnSpan(1)
                                ->maxLength(1500)
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                    'table',
                                    'italic',


                                ])

                        ]),


                    Section::make(__('Products'))
                    ->description(__('This is the Products information about the Product Line.'))
                    ->collapsible(true)
                    ->schema([
                        MarkdownEditor::make('product_ar')
                        ->label(__('Products in arabic'))
                        ->required()
                        ->maxLength(1500)
                        ->disableToolbarButtons([
                            'attachFiles',
                            'codeBlock',
                            'table',
                            'italic',


                        ])
                        ->columnSpan(1),
                        MarkdownEditor::make('product_en')
                        ->label(__('Products in english'))
                        ->required()->columnSpan(1)
                        ->maxLength(1500)
                        ->disableToolbarButtons([
                            'attachFiles',
                            'codeBlock',
                            'table',
                            'italic',


                        ])

                    ]),

                    Section::make(__('Features'))
                        ->description(__('This is the Features information about the Product Line.'))
                        ->collapsible(true)
                        ->schema([
                            MarkdownEditor::make('feature_ar')
                                ->label(__('Features in arabic'))
                                ->required()
                                ->maxLength(1500)
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                    'table',
                                    'italic',


                                ])
                                ->columnSpan(1),
                            MarkdownEditor::make('feature_en')
                                ->label(__('Features in english'))
                                ->required()->columnSpan(1)->maxLength(1500)
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                    'table',
                                    'italic',


                                ]),



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


                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([

                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make()
                ->label(__('Delete'))
                ->requiresConfirmation()
                ->modalHeading(__('Delete Product Line')),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListProductLines::route('/'),
            'create' => Pages\CreateProductLine::route('/create'),
            'edit' => Pages\EditProductLine::route('/{record}/edit'),
        ];
    }
}
