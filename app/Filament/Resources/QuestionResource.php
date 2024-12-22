<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Question;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\QuestionResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\QuestionResource\RelationManagers;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Questions Data');
    }

    public static function getModelLabel(): string
    {
        return __('Question');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Questions');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('question_ar')
                ->label(__('question in Arabic'))
                ->required()
                ->autofocus(),

                TextInput::make('answer_ar')
                ->label(__('answer in Arabic'))
                ->required()
                ->autofocus(),

                TextInput::make('question_en')
                ->label(__('question in English'))
                ->required()
                ->autofocus(),

                TextInput::make('answer_en')
                ->label(__('answer in English'))
                ->required()
                ->autofocus(),
                Select::make('category')
                ->label(__('category'))
    ->options([
        'all' => __('all'),
        'services' => __('services , products , products lines'),
        'jobs' => __('jobs'),
        'contact'=>__('contacts and parteners'),
        'support' =>__('technical support')
    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('question_'.app()->getLocale())
                ->label(__('question')),

                TextColumn::make('answer_'.app()->getLocale())
                ->label(__('answer'))
                ->words(10),
                TextColumn::make('category')
                ->label(__('category')),

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
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
