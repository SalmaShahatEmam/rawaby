<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            'phone' => 'required|string|max:15',
            'account_holder_name' => 'required|string|max:255',
            'bank_id' => 'required|exists:banks,id',
            'iban' => 'required|string|max:34',
            'account_number' => 'required|string|max:20',
            'type' => 'required|in:individual,company', // يجب أن يكون فرد أو شركة


            // شروط للأفراد
            'identity_number' => 'required_if:type,individual|nullable|string|max:20',
            // شروط للشركات
            'job_title' => 'required_if:type,company|nullable|string|max:255',
            'tax_number' => 'required_if:type,company|nullable|string|max:20',
            'register_file' => 'required_if:type,company|nullable|mimes:pdf,doc,docx'

        ];
    }
}
