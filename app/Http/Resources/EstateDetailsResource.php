<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstateDetailsResource extends JsonResource
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
            'category' => $this->category->name,
            'name' =>  $this->name ? transword($this->name, app()->getLocale()) : null,
            'price' => (float) $this->price,
            'price_text' => $this->price . ' ' . __('ريال سعودي / الشهر'),
            'reviews_count' => $this->reviewsActive->count() . ' ' . __('تقييم'),
            'rating' =>  number_format($this->reviewsActive->avg('rate') , 2) ,
            'city' => $this?->city?->name,
            'address' => $this->address,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'type' => __($this->type),//single or marriage
            'area' => $this->area,
            'rooms' => $this->rooms,
            'baths' => $this->baths,
            'finishing' => __($this->finishing),  //super_lux or normal
            'desc' =>   $this->desc ? transword($this->desc, app()->getLocale()) : null,
            'features' => FeatureResource::collection($this->features),
            'booking_conditions' => $this->booking_conditions,
            'cancellation_policy' => __('بإمكانك إلغاء او تأجيل الحجز مجاناً قبل تاريخ') . ' ' . $this->CancellationPolicyDate,
            'tourism_ministry' => $this->tourism_ministry_path,
            'owner_id' => $this->user_id,
            'owner_name' => $this->user->name,
            'owner_image' => $this->user->avatar,
            'owner_reviews_avg' => (float) $this->user->OwnerAvgReview ?? 0,
            'landmarks' => $this->landmarks ? transword($this->landmarks, app()->getLocale()) : null,
            'arrival_time' => $this->FormattedArrivalTime,
            'departure_time' => $this->FormattedDepartureTime,
            'images' => ImageResource::collection($this->images),
            'images_count' => $this->images_count,
            'is_favorite' =>$this->isFavorite(auth()->id()) ,
            'share_link' => route('site.retreat.show', $this->slug),
            'reviews' => ReviewResource::collection($this->reviewsActive),
            'start_at' =>  $this->start_at,

                //   'city_id' => $this->city_id,
                // 'feature_ids' => $this->features->pluck('id'), // المميزات
                //  'insurance_amount' => (float) $this->insurance_amount,
                // 'status' => $this->status,
               // 'step' => $this->step,
               // 'is_completed' => $this->is_completed,
        ];

    }
}
