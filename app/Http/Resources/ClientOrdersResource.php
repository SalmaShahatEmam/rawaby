<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientOrdersResource extends JsonResource
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
            'order_number' => $this->order_number,
            'image' => $this->estate?->images?->first()->image_path,
            'name' => $this->user?->name,
            'phone' => $this->user?->phone,
            'booking_date' => $this->created_at->format('d/m/Y'),
            'months' => $this->months . ' ' . __('شهر'),
            'start_at' => $this->start_at->format('d/m/Y'),
            'end_at' => $this->end_at->format('d/m/Y'),

            'arrival_time' => $this?->estate?->FormattedArrivalTime,
            'departure_time' => $this?->estate?->FormattedDepartureTime,


        ];
    }
}
