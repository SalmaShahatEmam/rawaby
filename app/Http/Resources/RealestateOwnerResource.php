<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RealestateOwnerResource extends JsonResource
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
            'name' => $this->name,
            'price' => $this->price . ' ' . __('ريال سعودي / الشهر'),
            'area' => $this->area,
            'rooms' => $this->rooms,
            'baths' => $this->baths,
            'desc' => transword($this->desc, app()->getLocale()),
            'address' => $this->address,
            'city' => $this->city->name,
            'image' => ImageResource::collection($this->images),
            'created_at' => $this->created_at->format('Y-m-d'),
            'booking' => $this->orders()->where('end_at' , '>=', now())->exists() ? __('محجوزة') : __('غير محجوزة'),
        ];
    }
}
