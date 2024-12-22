<?php

namespace App\Http\Requests\API;

use App\Models\Estate;
use App\Http\Requests\API\MasterApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class EstateRequest extends MasterApiRequest
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
        $rules = [
            'step' => 'required|integer|between:1,6',
        ];

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
            'type' => 'required|in:single,marriage,both',
            'category_id' => 'required|exists:categories,id',
            'area' => 'required|integer|min:10|max:10000',
            'rooms' => 'required|integer|min:1',
            'baths' => 'required|integer|min:1',
            'finishing' => 'required|in:deluxe,super_lux,lux,medium,simple',
            'desc' => 'required|string',
        ];
    }

    /**
     * Validation rules for step 2.
     */
    private function stepTwoRules(): array
    {
        return [
            'city_id' => 'required|exists:cities,id',
            'landmarks' => 'nullable|string|max:255',
            'address' => 'required|string',
            'lat' => 'required|string',
            'lng' => 'required|string',
        ];
    }

    /**
     * Validation rules for step 3.
     */
    private function stepThreeRules(): array
    {

        
        return [
            'feature_ids' => 'required|array',
            'feature_ids.*' => 'exists:features,id',
            'images' => 'required|array|min:2',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    /**
     * Validation rules for step 4.
     */
    private function stepFourRules(): array
    {
        return [
            'arrival_time' => 'required|string|date_format:H:i', //eg:
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
            'tourism_ministry' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
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
