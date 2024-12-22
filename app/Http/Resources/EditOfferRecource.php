<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EditOfferRecource extends JsonResource
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
            'estate_id' => $this->estate_id,
            'start_at' => $this->start_at->format('Y-m-d'),
            'end_at' => $this->end_at->format('Y-m-d'),
            'user_id' => $this->user_id,
            'type' => $this->type,
            'value' => $this->value,
            'status' => $this->status,
            'days' => $this->days,
        ];
    }
}
