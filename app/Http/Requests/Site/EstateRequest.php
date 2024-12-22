<?php

namespace App\Http\Requests\Site;

use App\Models\Estate;
use Illuminate\Foundation\Http\FormRequest;

class EstateRequest extends FormRequest
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
        $rules = [];

        switch ($this->step) {
            case 1:
                $rules = $this->stepOneRules();
                break;
            case 2:
                $rules = $this->stepTwoRules();
                break;
            case 3:
                $rules = $this->stepThreeRules();
                break;
            case 4:
                $rules = $this->stepFourRules();
                break;
            case 5:
                $rules = $this->stepFiveRules();
                break;
        }

        return $rules;
    }




    /**
     * Validation rules for step 1.
     */
    private function stepOneRules(): array
    {
        return [
            'name' => 'required|string|max:255|min:3',
            'area' => 'required|integer|min:10|max:10000',
            'rooms' => 'required|integer|min:1',
            'baths' => 'required|integer|min:1',
            'type' => 'required|in:single,marriage,both',
            'finishing' => 'required|in:deluxe,super_lux,lux,medium,simple',
            'desc' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    /**
     * Validation rules for step 2.
     */
    private function stepTwoRules(): array
    {
        return [
            'city_id' => 'required|exists:cities,id',
            'lat' => 'required|string',
            'lng' => 'required|string',
            'address' => 'required|string',
            'landmarks' => 'nullable|string|max:255',
        ];
    }

    /**
     * Validation rules for step 3.
     */
    private function stepThreeRules(): array
    {
        $estate = $this->getEstate();
        $estateImageCount = count($estate->images ?? []);
            if ( $estateImageCount >= 5) {

                $imagesRule = 'nullable';

            } else {
                $imagesRule = 'required';
            }




        return [
            'feature_ids' => 'required|array',
            'feature_ids.*' => 'exists:features,id',
            'images' => $imagesRule,
           // 'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    /**
     * Validation rules for step 4.
     */
    private function stepFourRules(): array
    {
        return [
            'arrival_time' => 'required|string|date_format:H:i',
            'departure_time' => 'required|string|date_format:H:i|after:arrival_time',
            'insurance_amount' => 'required|integer|min:10|lt:price',
            'price' => 'required|integer|min:100',
            'cancellation_policy' => 'required|integer|min:1',
            'booking_conditions' => 'nullable|string',
        ];
    }

    /**
     * Validation rules for step 5.
     */
    private function stepFiveRules(): array
    {
        $estate = $this->getEstate();
        $tourismMinistryRule = $estate && $estate->step > 5 ? 'nullable' : 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048';
        return [
            'tourism_ministry' => $tourismMinistryRule,
        ];
    }

    private function getEstate()
    {
        $estateId = $this->estate_id;
        $estate = Estate::where('user_id', auth()->id())
            //if estate is found (update method)
            ->when($estateId, function ($query, $estateId) {
                $query->where('id', $estateId);
            },
                //else if estate is not found (store method)
            function ($query) {
                $query->where('is_completed', 0);
            })
            ->first();

        return $estate;

    }

    public function messages(){


        return [

            'images.required' => __('يجب ان يكون عدد الصور 5 على الاقل'),
            'name.required' => __('يجب ادخال الاسم الخاص بالعقار'),
            'cancellation_policy.required' => __('يجب ادخال سياسة الالغاء'),
        ];
    }

}
