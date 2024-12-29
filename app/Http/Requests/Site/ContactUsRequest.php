<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ContactUsRequest extends FormRequest
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
            "name" => [
                "required",
                "regex:/^[\p{Arabic}a-zA-Z\s]{2,}$/u", // At least two Arabic or English letters
                "max:50"
            ],
            "email" => [
                "required",
                "email:rfc,dns",
              //  "regex:/^[a-zA-Z ]{2,}$/"// Must not contain English letters
            ],
            "phone" => [
                "required",
                "digits_between:9,15", // Between 9 and 15 digits
                "regex:/^\d+$/", // Only numeric values
            ],
            'message' => 'required|min:3|max:50',
            "subject"=>"required|min:3|max:50"
        ];
    }

    public function messages(): array
{
    return [
        "name.required" => __("The name is required."),
        "name.regex" => __("The name must contain at least two letters in Arabic or English and cannot contain numbers or special characters."),
        "name.max" => __("The name must not exceed 50 characters."),

        "email.required" => __("The email address is required."),
        "email.email" => __("Please enter a valid email address."),
        // "email.regex" => __("The email address must not contain English letters."),

        "phone.required" => __("The phone number is required."),
        "phone.digits_between" => __("The phone number must be between 9 and 15 digits."),
        "phone.regex" => __("The phone number must contain only numbers."),

        "message.required" => __("The message is required."),
        "message.min" => __("The message must contain at least 3 characters."),
        "message.max" => __("The message must not exceed 50 characters."),

        "subject.required" => __("The subject is required."),
        "subject.min" => __("The subject must contain at least 3 characters."),
        "subject.max" => __("The subject must not exceed 50 characters."),
    ];
}

}
