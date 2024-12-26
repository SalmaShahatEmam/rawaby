<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class JobApplicationRequest extends FormRequest
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
   /*  public function rules(): array
    {
        return [
           // "job_id" =>"required|exists:jobs,id",
            "name" =>"required|min:3|max:50",
            "email" =>"required|email",
            "phone" =>"required",
            "resume" =>"required|mimes:pdf,docx",
            "address" =>"required",
            "city"=>"required"
        ];
    } */

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
        "resume" => [
            "required",
            "mimes:pdf,docx" // File must be either .pdf or .docx
        ],
        "address" => [
            "required",
            "min:2",            "max:50"
            // At least 2 characters
        ],
        "city" => [
            "required",
            "regex:/^[\p{Arabic}]{2,}$/u",            "max:50"
            // At least two Arabic letters, no numbers
        ],
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

        "resume.required" => "السيرة الذاتية مطلوبة.",
        "resume.mimes" => "السيرة الذاتية يجب أن تكون بصيغة pdf أو docx.",

        "address.required" => "العنوان مطلوب.",
        "address.min" => "العنوان يجب أن يكون مكونًا من حرفين على الأقل.",

        "city.required" => "المدينة مطلوبة.",
        "city.regex" => "المدينة يجب أن تكون مكونة من حرفين على الأقل باللغة العربية ولا تحتوي على أرقام.",
    ];
}


    /* public function messages(): array
    {
        return [

            "resume.required" =>""
        ];
    } */
}
