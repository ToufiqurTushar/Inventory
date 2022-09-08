<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodEntryStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'sub_name' => ['nullable', 'max:255', 'string'],
            'name_bn' => ['nullable', 'max:255', 'string'],
            'sub_name_bn' => ['nullable', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'price' => ['required', 'numeric'],
            'discounted_price' => ['nullable', 'numeric'],
            'created_by_id' => ['nullable', 'max:255'],
        ];
    }
}
