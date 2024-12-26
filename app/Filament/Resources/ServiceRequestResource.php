<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Mail\AlphaMail;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ServiceRequest;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceRequestResource\Pages;
use App\Filament\Resources\ServiceRequestResource\RelationManagers;

class ServiceRequestResource extends Resource
{
    protected static ?string $model = ServiceRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationGroup(): ?string
    {
        return __('Requests');
    }

    public static function getModelLabel(): string
    {
        return __('Request');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Requests');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function canCreate(): bool
    {
        return false; // تعطيل زر الإضافة
    }
    public static function table(Table $table): Table
    {
        return $table
        ->modifyQueryUsing(function (Builder $query) {
            return $query->latest('created_at');
        })
            ->columns([
                TextColumn::make('name')
                    ->label(__("name"))
                    ->searchable()
                    ,
                TextColumn::make("phone")
                    ->label(__('phone'))
                    ->searchable()
                    ,
                /*                     TextColumn::make("requestable_type")
                    ->label(__('Type'))
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'App\Models\Product' => __('Product'),
                            'App\Models\Service' => __('Service'),
                            'App\Models\Project' => __('Project'),
                            default => __('Unknown'),
                        };
                    }), */
                /* TextColumn::make("requestable_type")
                    ->label(__('Type'))
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'App\Models\Product' => __('Product'),
                            'App\Models\Service' => __('Service'),
                            'App\Models\Project' => __('Project'),
                            default => __('Unknown'),
                        };
                    })
                    ->extraAttributes(fn($record) => [
                        'class' => match ($record->requestable_type) {
                            'App\Models\Product' => 'text-green-600 bg-green-100 px-2 py-1 rounded', // Green for Product
                            'App\Models\Service' => 'text-yellow-600 bg-yellow-100 px-2 py-1 rounded', // Yellow for Service
                            'App\Models\Project' => 'text-blue-600 bg-blue-100 px-2 py-1 rounded', // Blue for Project
                            default => 'text-gray-600 bg-gray-100 px-2 py-1 rounded', // Gray for Unknown
                        },
                    ]),
 */
                TextColumn::make("requestable_type")
                ->badge()
                    ->label(__('Type'))

                    ->colors([
                        'success' => 'App\Models\Product',  // Green
                        'warning' => 'App\Models\Service',  // Yellow
                        'info'    => 'App\Models\Project',  // Blue
                        'gray'    => null,                  // Default
                    ])
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'App\Models\Product' => __('a Product'),
                            'App\Models\Service' => __('a Service'),
                            'App\Models\Project' => __('a Project'),
                            default => __('Unknown'),
                        };
                    })
                 //   ->searchable()
                    ,
                TextColumn::make('requestable.name')
                    ->label(__('name of service')),
                    TextColumn::make('is_replay')
                    ->label(__('isReply'))
                    ->default('not service')
                    ->searchable()
                   ->sortable()
                    ->formatStateUsing(function (ServiceRequest $record) {
                        return $record->is_replay == 1 ? __('is replied') : __('not replied');
                    })
                    ->color(function (string $state): string {
                        if ($state == '1') {
                            return 'success';
                        } else {
                            return 'danger';
                        }
                    })
                    ->badge(),
            ])
            ->filters([
                SelectFilter::make('is_replay')
                ->label(__('filter by Replay'))

                ->options([
                    '1' => __('is replied'),
                    '0' => __('not replied'),
                ]),
                SelectFilter::make('requestable_type')
                ->label(__('Type'))

                ->options([
                    'App\Models\Product' => __('a Product'),
                    'App\Models\Service' => __('a Service'),
                    'App\Models\Project' => __('a Project'),
                ]),
              
            ])
            ->actions([
               // Tables\Actions\EditAction::make(),

               Tables\Actions\ActionGroup::make([

                Tables\Actions\ViewAction::make(),
                Action::make('Send Reply')
                    ->label(__('Send Reply'))
                    ->form([
                        Textarea::make('reply')
                            ->label(__('Reply'))
                            ->minLength(3)

                            ->columnSpan(3)
                            ->rows(5)
                            ->required(),
                    ])
                    ->action(function (ServiceRequest $ServiceOrder, array $data) {

                      //  Mail::to($ServiceOrder->email)->send(new AlphaMail($data));


                        $ServiceOrder->is_replay = 1;
                        $ServiceOrder->save();


                        Notification::make()
                            ->title(__('Reply Sent Successfully'))
                            ->success()
                            ->icon('heroicon-o-inbox')
                            ->iconColor('success')
                            ->send();
                    })->icon('heroicon-o-chat-bubble-left-right')
            ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([]);
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
            'index' => Pages\ListServiceRequests::route('/'),
            //  'create' => Pages\CreateServiceRequest::route('/create'),
            //'edit' => Pages\EditServiceRequest::route('/{record}/edit'),
        ];
    }



    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Grid::make(2) // تقسيم العناصر إلى عمودين
                    ->schema([
                        TextEntry::make('name')
                            ->label(__('Name')),

                        TextEntry::make('email')
                            ->label(__('Email'))
                            ->url(fn(ServiceRequest $record) => 'mailto:' . $record->email, true), // رابط البريد الإلكتروني

                        TextEntry::make('phone')
                            ->label(__('Phone'))
                            ->url(fn(ServiceRequest $record) => 'tel:' . $record->phone, true), // رابط الهاتف

                        TextEntry::make('country')
                            ->label(__('country')),
                            TextEntry::make('job_title')
                            ->label(__('job_title')),
                            TextEntry::make('company_name')
                            ->label(__('company_name')),

                        TextEntry::make('requestable.name' )
                            ->label(__('Service Name')),

                        TextEntry::make('message')
                            ->label(__('Message')),

                        TextEntry::make('is_replay')
                            ->label(__('Is Reply'))
                            ->formatStateUsing(fn(ServiceRequest $record) => $record->is_replay ? __('Is Replied') : __('Not Replied'))
                            ->color(fn(ServiceRequest $record) => $record->is_replay ? 'success' : 'danger')
                            ->badge(),

                        TextEntry::make('created_at')
                            ->label(__('Created At'))
                            ->dateTime(),
                    ]),
            ]);
    }


}
