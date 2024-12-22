<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Service;
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
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\ServiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceResource\RelationManagers;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Services and Target Secors Data');
    }

    public static function getModelLabel(): string
    {
        return __('Service');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Services');
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
                                ->unique(Service::class, 'name_ar', ignoreRecord: true)

                                ->required(),

                            TextInput::make('name_en')
                                ->required()
                                ->label(__('name_en'))
                                ->minLength(3)
                                ->maxLength(255)
                                ->unique(Service::class, 'name_en', ignoreRecord: true)

                                ->autofocus()
                                ->lazy()
                                ->afterStateUpdated(function (Set $set, ?string $state) {
                                    $set('slug', str()->slug($state));
                                }),
                            TextInput::make('slug')
                                ->required()

                                ->unique(Service::class, 'slug', ignoreRecord: true)
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

                    Section::make(__('Images Information'))
                        ->description(__('This is the images information about the service.'))
                        ->collapsible(true)

                        ->schema([

                            FileUpload::make('images')
                                ->label(__('image'))
                                ->minFiles(1)
                                ->maxFiles(1)
                                ->helperText(__('Upload 1 image for the service only'))

                                ->disk('public')->directory('Service')
                                ->columnSpanFull()
                                ->preserveFilenames()
                                ->reorderable()

                                ->required()
                                ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/gif']),
                        ]),


                    Section::make(__('Service Steps'))
                        ->description(__('This is the images information about the service.'))
                        ->collapsible(true)

                        ->schema([



                            MarkdownEditor::make('service_steps_ar')
                                ->label(__('advantages in arabic'))
                                ->required(),


                            MarkdownEditor::make('service_steps_en')
                                ->label(__('advantages in english'))
                                ->required(),
                        ]),


                    Section::make(__('Service Advantages'))
                        ->description(__('This is the Advantages of the service.'))
                        ->collapsible(true)

                        ->schema([
                            MarkdownEditor::make('advantages_ar')
                                ->label(__('advantages in arabic'))
                                ->required(),


                            MarkdownEditor::make('advantages_en')
                                ->label(__('advantages in english'))
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
                    ->label(__("name")),
                TextColumn::make('desc_' . app()->getLocale())
                    ->label(__('description'))
                    ->limit(20),
                    ImageColumn::make('images')
                    ->label(__('images'))
                    ->circular(),


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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
