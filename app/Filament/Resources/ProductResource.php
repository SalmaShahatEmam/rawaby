<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Blog;
use Filament\Tables;
use App\Models\Product;
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
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Products and Product Lines Data');
    }

    public static function getModelLabel(): string
    {
        return __('Product');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Products');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                /*
                 'advantages_en',
        'advantages_ar',
        'applications_en',
        'applications_ar',
        'feature_en',
        'feature_ar'
                 */
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

                                ->unique(Product::class, 'slug', ignoreRecord: true)
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

                                ->columnSpan(3)
                                ->required(),


                            RichEditor::make('desc_en')
                                ->label(__('desc_en'))
                                ->minLength(3)

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


                        Section::make(__('Advantages Information'))
                        ->description(__('This is the Advantages information about the Product.'))
                        ->collapsible(true)

                        ->schema([

                            RichEditor::make('advantages_ar')
                                ->label(__('advantage in arabic'))
                                ->minLength(3)

                                ->columnSpan(3)
                                ->required(),


                            RichEditor::make('advantages_en')
                                ->label(__('advantage in english'))
                                ->minLength(3)

                                ->columnSpan(3)
                                ->required(),

                        ]),


                        Section::make(__('Feature Information'))
                        ->description(__('This is the feature information about the Product.'))
                        ->collapsible(true)

                        ->schema([

                            RichEditor::make('feature_ar')
                                ->label(__('feature in arabic'))
                                ->minLength(3)

                                ->columnSpan(3)
                                ->required(),


                            RichEditor::make('feature_en')
                                ->label(__('feature in english'))
                                ->minLength(3)

                                ->columnSpan(3)
                                ->required(),

                        ]),

                        Section::make(__('applications Information'))
                        ->description(__('This is the applications information about the Product.'))
                        ->collapsible(true)

                        ->schema([

                            RichEditor::make('applications_ar')
                                ->label(__('applications in arabic'))
                                ->minLength(3)

                                ->columnSpan(3)
                                ->required(),


                            RichEditor::make('applications_en')
                                ->label(__('applications in english'))
                                ->minLength(3)

                                ->columnSpan(3)
                                ->required(),

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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
