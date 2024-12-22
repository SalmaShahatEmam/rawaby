<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstateActionsRecource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'step' => $this->step,
            //step 1
            'id' => $this->id,
            'name' =>  $this->name ,
            'type' => $this->type,//single or marriage
            'category_id' => $this->category_id,
            'area' => $this->area,
            'rooms' => $this->rooms,
            'baths' => $this->baths,
            'finishing' => $this->finishing,  //super_lux or normal
            'desc' =>   $this->desc ,
            //step 2
            'city' => $this?->city_id,
            'address' => $this->address,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'landmarks' => $this->landmarks ? transword($this->landmarks, app()->getLocale()) : null,
            //step 3
            'images' => ImageResource::collection($this->images),
             'feature_ids' => $this->feature_ids ?? [],
            //step 4
            'arrival_time' => $this->arrival_time,
            'departure_time' => $this->departure_time,
            'insurance_amount' =>  $this->insurance_amount,
            'price' => $this->price,
            'cancellation_policy' => $this->cancellation_policy,
            'booking_conditions' => $this->booking_conditions,
            //step 5
            'tourism_ministry' => $this->tourism_ministry_path,
             'is_completed' => $this->is_completed,

            // 'features' => FeatureResource::collection($this->features),
                //   'city_id' => $this->city_id,
                // 'status' => $this->status,
        ];
    }
}
