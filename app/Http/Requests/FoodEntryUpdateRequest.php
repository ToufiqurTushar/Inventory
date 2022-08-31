<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodEntryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_name' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'production_cost' => ['required', 'numeric'],
            'sale_cost' => ['required', 'numeric'],
            'member_discount' => ['nullable', 'numeric'],
            'special_discount' => ['nullable', 'numeric'],
            'others_discount' => ['nullable', 'numeric'],
            'created_by_id' => ['required', 'max:255'],
        ];
    }
}
