<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CategoryResource\RelationManagers;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Category and Products Data');
    }
    public static function getModelLabel(): string
    {
        return __('Category');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Categories');
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->schema([
                    Section::make(__('Category Information'))
                        ->description(__('This is the main information about the Category.'))
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


                              ,


                        ])->columns(2),


                    Section::make(__('Images Information'))
                        ->description(__('This is the images information about the Category.'))
                        ->collapsible(true)

                        ->schema([



                            FileUpload::make('icon')
                                ->label(__('image'))
                                ->disk('public')->directory('category')
                                ->columnSpanFull()
                                ->preserveFilenames()
                                ->reorderable()
                                ->image()

                                ->required(),
                        ]),




                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    ImageColumn::make('icon')
                        ->label(__('image'))
                        ->circular(),
                    TextColumn::make('name_' . app()->getLocale())
                        ->searchable()
                        ->label(__('name_' . app()->getLocale()))
                        ->words(20)
                        ->wrap(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
