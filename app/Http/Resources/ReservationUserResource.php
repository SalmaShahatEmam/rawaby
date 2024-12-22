<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'image' => $this->estate?->images?->first()->image_path,
            'price_text' => $this->price . ' ' . __('ريال سعودي / الشهر'),
            'desc' =>   $this?->estate?->desc ? transword( $this?->estate?->desc, app()->getLocale()) : null,

            'city' => $this?->estate?->city?->name,
            'address' => $this?->estate?->address,
            'months' => $this->months . ' ' . __('شهر'),
            'start_at' => $this->start_at->format('d/m/Y'),
            'end_at' => $this->end_at->format('d/m/Y'),

            'arrival_time' => $this?->estate?->FormattedArrivalTime,
            'departure_time' => $this?->estate?->FormattedDepartureTime,


        ];
    }
}
