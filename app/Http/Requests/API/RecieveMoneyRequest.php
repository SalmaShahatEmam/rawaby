<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\MasterApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class RecieveMoneyRequest extends MasterApiRequest
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
            'name' => 'required|string|min:3|max:255',
            'iban' => 'required|string|min:15|max:25',
            'bank_id' => 'required|exists:banks,id',
            'account_number' => 'required|string|min:10|max:25'
        ];
    }
}
