<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\JobApplication;
use App\Models\JobApplications;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JobApplicationsResource\Pages;
use App\Filament\Resources\JobApplicationsResource\RelationManagers;

class JobApplicationsResource extends Resource
{
    protected static ?string $model = JobApplication::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Jobs and Job Applications');
    }

    public static function getModelLabel(): string
    {
        return __('Job');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Job Applications');
    }
    public static function canCreate(): bool
    {
        return false; // تعطيل زر الإضافة
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("name")
                ->label(__('name')),
                TextColumn::make("email")
                ->label(__('email')),
                TextColumn::make("phone")
                ->label(__('phone')),
                TextColumn::make("job.title")
                ->label(__('Job')),
                TextColumn::make('resume')
                    ->label(__('ملف الوثيقة'))
                    ->formatStateUsing(function (string $state) {

                        return $state ? __('السيرة الذاتية') : 'لايوجد ملف';
                    })
                    ->url(fn($record) => $record->file_path, shouldOpenInNewTab: true)
                    ->searchable()
                    ->sortable(),

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
            ])

            ->defaultPaginationPageOption(25);
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
            'index' => Pages\ListJobApplications::route('/'),
            'create' => Pages\CreateJobApplications::route('/create'),
            'edit' => Pages\EditJobApplications::route('/{record}/edit'),
        ];
    }
}
