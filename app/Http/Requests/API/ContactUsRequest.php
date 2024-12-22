<?php

namespace App\Http\Requests\API;

use App\Rules\EamilDomains;
use App\Http\Requests\API\MasterApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends MasterApiRequest
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
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', new EamilDomains()],
            'phone' => 'required|string|min:11|max:15',
            'message' => 'required|string|min:3',
            'subject'   => 'required|string|min:3',
        ];
    }
}
