<?php

namespace App\Http\Requests\API;

use App\Models\Estate;
use App\Http\Requests\API\MasterApiRequest;

class OfferRequest extends MasterApiRequest
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
        // $daysString = $this->input('days');
        // $daysArray = $this->convertStringToArray($daysString);
        // dd($daysArray); // عرض المصفوفة للتحقق
                return [
            'name' => 'required|string',
            'estate_id' => 'required|exists:estates,id',
            'type' => 'required|in:percentage,fixed',
            'value' => $this->getValueRule(),
            'start_at' => 'required|date|after:now',
            'end_at' => 'required|date|after:start_at',
            'days' => 'array|required',
            'days.*' => 'required|in:saturday,sunday,monday,tuesday,wednesday,thursday,friday',
        ];
    }

    private function getValueRule(): string
    {
        if ($this->type === 'percentage') {
            return 'numeric|min:0|max:100';
        }

        return $this->getFixedValueRule();
    }

    private function getFixedValueRule(): string
    {
        $estatePrice = $this->getEstatePrice();

        return $estatePrice ? "numeric|min:0|max:$estatePrice" : 'numeric|min:0';
    }

    private function getEstatePrice(): ?float
    {
        if (!$this->estate_id) {
            return null;
        }

        return Estate::where('id', $this->estate_id)
            ->where('user_id', auth()->id())
            ->value('price');
    }

    public function messages(): array
    {
        return [
            'name.required' => __('Offer name is required'),

        ];
    }



    // private function convertStringToArray(string $daysString): array
    // {
    //     // تعديل السلسلة النصية لتكون بتنسيق JSON صالح
    //     $jsonString = str_replace(['[', ']'], ['["', '"]'], $daysString);
    //     $jsonString = str_replace(', ', '","', $jsonString);

    //     // تحويل السلسلة النصية إلى مصفوفة
    //     return json_decode($jsonString, true);
    // }
}
