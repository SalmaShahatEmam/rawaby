<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;

use App\Models\Project;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Category and Products Data');
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

                Grid::make()->schema([
                    Section::make(__('Product Information'))
                        ->description(__('This is the main information about the Product.'))
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
                            Select::make('categories')
                                ->multiple()
                                ->relationship('categories', 'name_' . app()->getLocale())
                                ->preload()
                                ->searchable()
                                ->required(),

                                TextInput::make('descount')
                                ->label(__('descount'))
                                ->minLength(3)
                                ->maxLength(255)

                                ->required(),
                           Repeater::make('sizes')
                                ->relationship('sizes') // Reference to ProductSize model
                                ->schema([
                                    TextInput::make('size')->required()->label('Size'),
                                    TextInput::make('quantity')->numeric()->minValue(0)->required()->label('Quantity'),
                                    TextInput::make('price')->numeric()->minValue(0)->required()->label('Price'),
                                ])
                                ->addActionLabel('Add Size')
                                ->columnSpanFull(),


                        ])->columns(3),


                    Section::make(__('Description Information'))
                        ->description(__('This is the description information about the product.'))
                        ->collapsible(true)

                        ->schema([

                            RichEditor::make('desc_ar')
                                ->label(__('desc_ar'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->columnSpan(3)
                                ->required()
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                    'table',
                                    'italic',


                                ]),


                            RichEditor::make('desc_en')
                                ->label(__('desc_en'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->columnSpan(3)
                                ->required()
                                ->disableToolbarButtons([
                                    'attachFiles',
                                    'codeBlock',
                                    'table',
                                    'italic',


                                ]),


                        ]),

                    Section::make(__('Images Information'))
                        ->description(__('This is the images information about the product.'))
                        ->collapsible(true)

                        ->schema([



                            FileUpload::make('image')
                                ->label(__('main image'))
                                ->disk('public')->directory('products')
                                ->columnSpanFull()
                                ->image()

                                //->acceptedFileTypes(['images/*'])

                                ->preserveFilenames()
                                ->reorderable()

                                ->required()
                                ->maxFiles(1),


                        FileUpload::make('images')
                       ->label(__('other images'))
                       ->disk('public')->directory('products')

                        ->multiple()
                      //  ->maxParallelUploads(5)
                   //   ->reorderable()
                      ->storeFiles()
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
                TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\RestoreAction::make(),
                    Tables\Actions\ForceDeleteAction::make(),

                ]),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }


    public static function afterCreate($record, array $data): void
    {
        if (!empty($data['images'])) {
            foreach ($data['images'] as $imagePath) {
                 dd($imagePath);
            }
        }
    }

}
