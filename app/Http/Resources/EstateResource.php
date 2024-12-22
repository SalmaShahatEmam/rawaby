<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EstateResource extends JsonResource
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
            'price' => $this->price . ' ' . __('ريال سعودي / الشهر'),
            'area' => $this->area,
            'rooms' => $this->rooms,
            'baths' => $this->baths,
            'desc' => transword($this->desc, app()->getLocale()),
            'city' => $this?->city?->name,
            'reviews_count' => $this->reviewsActive->count() . ' ' . __('تقييم'),
            //send the average of reviews just 2 numbers after the point  3.666666666666666518636930049979127943515777587890625
            'rating' =>  number_format($this->reviewsActive->avg('rate') , 2) ,
            'is_favorite' =>
                 $this->isFavorite(auth()->id())
          ,
            'image' => ImageResource::collection($this->images),


        ];
    }
}
