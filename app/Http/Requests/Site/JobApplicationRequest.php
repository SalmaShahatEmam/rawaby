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
    public function rules(): array
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
    }

    /* public function messages(): array
    {
        return [

            "resume.required" =>""
        ];
    } */
}
