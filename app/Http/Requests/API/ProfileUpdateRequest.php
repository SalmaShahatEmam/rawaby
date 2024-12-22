<?php

namespace App\Http\Requests\API;

use App\Http\Requests\API\MasterApiRequest;

class ProfileUpdateRequest extends MasterApiRequest
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
            'name' => 'required|string|max:255|min:3',
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email,' . auth()->id()],
            'phone' => ['required', 'string', 'min:10', 'max:14', 'unique:users,phone,' . auth()->id()],
            'old_password' => 'nullable|string|min:8',
            'password' => 'nullable|required_with:old_password|string|min:8|confirmed',
            'password_confirmation' => 'nullable|required_with:password|string|min:8',
        ];
    }
}
