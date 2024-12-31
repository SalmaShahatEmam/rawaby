<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class ServiceApplicationRequest extends FormRequest
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
            "name" =>"required",
            "email" =>"required|email:rfc,dns",
            "type" =>"required",
            "id" =>"required",
            "phone" => [
                "required",
                "digits_between:9,15", // Between 9 and 15 digits
                "regex:/^\d+$/", // Only numeric values
            ],
            "country"=>"required|min:2|max:50",
            "company_name" =>"required|min:2|max:50",
            "job_title" =>"required",
            "message" =>"required|min:2|max:255"
        ];
    }


    public function messages(): array
    {
        return [
            "name.required" => __("The name is required."),
            "email.required" => __("The email is required."),
            "email.email" => __("Please enter a valid email address."),
            "type.required" => __("The service type is required."),
            "id.required" => __("Please select a service."),
            "phone.required" => __("The phone number is required."),
            "country.required" => __("The country is required."),
            "company_name.required" => __("The company name is required."),
            "job_title.required" => __("The job title is required."),
            "message.required" => __("The message is required."),
        ];
    }


}
