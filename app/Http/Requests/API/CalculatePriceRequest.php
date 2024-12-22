<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CalculatePriceRequest extends MasterApiRequest
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
        return [
            'estate_id' => 'required|numeric|exists:estates,id',
            'start_date' => 'required|date', //example: 
            'months' => 'required|numeric',
        ];
    }
}
