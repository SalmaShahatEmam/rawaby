<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\Liberary;
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
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\LiberaryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LiberaryResource\RelationManagers;

class LiberaryResource extends Resource
{
    protected static ?string $model = Liberary::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Blog and Visial Liberary Data');
    }

    public static function getModelLabel(): string
    {
        return __('Visial Liberary');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Visial Liberaries');
    }

    public static function form(Form $form): Form
    {


                return $form
            ->schema([
                Grid::make()->schema([
                    Section::make(__('Service Information'))
                        ->description(__('This is the main information about the service.'))
                        ->collapsible(true)
                        ->schema([
                            TextInput::make('name_ar')
                                ->label(__('name_ar'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->unique(Liberary::class, 'name_ar', ignoreRecord: true)

                                ->required(),

                            TextInput::make('name_en')
                                ->required()
                                ->label(__('name_en'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->unique(Liberary::class, 'name_en', ignoreRecord: true)

                                ->autofocus()
                                ->lazy()
                                ->afterStateUpdated(function (Set $set, ?string $state) {
                                    $set('slug', str()->slug($state));
                                }),
                            TextInput::make('slug')
                                ->required()

                                ->unique(Liberary::class, 'slug', ignoreRecord: true)
                                ->disabled()
                                ->dehydrated(),

                        ])->columns(3),


                    Section::make(__('Description Information'))
                        ->description(__('This is the description information about the service.'))
                        ->collapsible(true)

                        ->schema([

                            Textarea::make('desc_ar')
                                ->label(__('desciption in arabic'))
                                ->minLength(3)

                                ->columnSpan(3)
                                ->rows(5)
                                ->required(),


                            Textarea::make('desc_en')
                                ->label(__('desciption in english'))
                                ->minLength(3)

                                ->columnSpan(3)
                                ->rows(5)
                                ->required(),

                        ]),

                    Section::make(__('Media Information'))
                        ->description(__('This is the Media information about the Liberary.'))
                        ->collapsible(true)

                        ->schema([


                            FileUpload::make('media')
                                ->label(__('media'))
                                ->disk('public')->directory('media')
                                ->acceptedFileTypes(['video/*']) // Allowed video formats

                                ->columnSpanFull()
                                ->preserveFilenames()
                                ->reorderable()
                                ->maxSize(10240) // Max file size in KB (e.g., 10MB)
                                //->enablePreview() // Enable preview (optional)

                                ->required(),
                            ]),




                ]),
            ])->columns(2);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
     
                TextColumn::make('name_' . app()->getLocale())
                    ->searchable()
                    ->label(__('name_' . app()->getLocale())),

                TextColumn::make('desc_' . app()->getLocale())
                    ->searchable()
                    ->label(__('desc_' . app()->getLocale()))
                    ->wrap()
                    ->words(50),


                TextColumn::make('created_at')
                    ->label(__('Created At'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListLiberaries::route('/'),
            'create' => Pages\CreateLiberary::route('/create'),
            'edit' => Pages\EditLiberary::route('/{record}/edit'),
        ];
    }
}
