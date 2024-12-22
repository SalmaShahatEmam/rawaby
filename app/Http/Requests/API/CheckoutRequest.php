<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\MasterApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends MasterApiRequest
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
            'payment' => ['required', 'exists:payment_methods,id'],
            'estate_id' => ['required', 'exists:estates,id'],
            'start_date' => ['required', 'date'],
            'months' => ['required', 'integer', 'min:1'],
            'end_date' => ['required', 'date' , 'after:start_date'],


        ];
    }
}
