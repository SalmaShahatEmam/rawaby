<?php

namespace App\Http\Requests\Site;

use App\Models\Estate;
use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {


        if ($this->type == 'percentage')  {
            $valueRule = 'numeric|min:0|max:100';
        } else {
            $estate_price = Estate::find($this->estate_id)->price;

            $valueRule = 'numeric|min:0|max:' . $estate_price;
        }

        return [
            'name' => 'required|string',
            'estate_id' => 'required|exists:estates,id',
            'type' => 'required|in:percentage,fixed',
            'value' => $valueRule,
            'start_at' => 'required|date|after:now',
            'end_at' => 'required|date|after:start_at',
            'days' => 'array|required',
            'days.*' => 'required|in:saturday,sunday,monday,tuesday,wednesday,thursday,friday',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Offer name is required'),
        ];
    }
}
