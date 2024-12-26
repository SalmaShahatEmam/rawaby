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
        "name.required" => "الاسم مطلوب.",
        "name.regex" => "الاسم يجب أن يحتوي على حرفين على الأقل باللغة العربية أو الإنجليزية ولا يحتوي على أرقام أو رموز خاصة.",
        "name.max" => "الاسم يجب ألا يزيد عن 50 حرفًا.",

        "email.required" => "البريد الإلكتروني مطلوب.",
        "email.email" => "يرجى إدخال بريد إلكتروني صالح.",
     //   "email.regex" => "البريد الإلكتروني يجب ألا يحتوي على حروف إنجليزية.",

        "phone.required" => "رقم الجوال مطلوب.",
        "phone.digits_between" => "رقم الجوال يجب أن يحتوي على 9 إلى 15 رقمًا.",
        "phone.regex" => "رقم الجوال يجب أن يحتوي على أرقام فقط.",

        "message.required" => "الرسالة مطلوبة.",
        "message.min" => "الرسالة يجب أن تحتوي على 3 أحرف على الأقل.",
        "message.max" => "الرسالة يجب ألا تزيد عن 50 حرفًا.",
        "subject.required" => "الموضوع مطلوب.",
        "subject.min" => "الموضوع يجب أن يحتوي على 3 أحرف على الأقل.",
        "subject.max" => "الموضوع يجب ألا يزيد عن 50 حرفًا.",
    ];
}
}
