<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
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
            'start_at' => $this->start_at->format('Y-m-d'),
            'end_at' => $this->end_at->format('Y-m-d'),
            'date_header' => __('من') . '  ' . $this->start_at->format('Y-m-d') . __('الي') . '  ' . $this->end_at->format('Y-m-d'),
            'estate' => $this->estate->name,
            'user_id' => $this->user->name,
            'type' => $this->type,
            'value' => $this->type == 'percentage' ? $this->value . '%' : Number::currency($this->value, 'SAR'),
            'status' => $this->status,
            'days' => collect($this->days)->map(function ($day) {

                return __($day);
            })->toArray()
        ];
    }
}
