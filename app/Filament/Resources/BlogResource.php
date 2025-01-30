<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Blog;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\BlogResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BlogResource\RelationManagers;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function getNavigationGroup(): ?string
    {
        return __('Blog Data');
    }
    public static function getModelLabel(): string
    {
        return __('Blog');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Blogs');
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

                                ->unique(Blog::class, 'slug', ignoreRecord: true)
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
                                ->image()

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
                    ->label(__('name_' . app()->getLocale()))
                    ->words(20)
                                       ->wrap(),


                TextColumn::make('desc_' . app()->getLocale())
                    ->searchable()
                    ->label(__('desc_' . app()->getLocale()))
                    ->wrap()
                    ->html()
                    ->words(50),


             /*    TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), */

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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
