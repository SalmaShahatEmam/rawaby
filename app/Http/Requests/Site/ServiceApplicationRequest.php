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
            "country"=>["required" , "regex:/^[\p{Arabic}]{2,}$/u", "max:50"],
            "company_name" =>"required|min:10|max:50",
            "job_title" =>"required",
            "message" =>"required|min:10,|max:50"
        ];
    }


    public function messages(): array
{
    return [
        "name.required" => "الاسم مطلوب.",
        "email.required" => "البريد الالكتروني مطلوب.",
        "email.email" => "يرجى إدخال بريد إلكتروني صالح.",
        "type.required" => "نوع الخدمة مطلوب.",
        "id.required" => "الرجاء اختيار خدمة.",
        "phone.required" => "رقم الهاتف مطلوب.",
        "country.required" => "الدولة مطلوبة.",
        "company_name.required" => "اسم الشركة مطلوب.",
        "job_title.required" => "الوظيفة مطلوبة.",
        "message.required" => "الرسالة مطلوبة."
    ];
}

}
