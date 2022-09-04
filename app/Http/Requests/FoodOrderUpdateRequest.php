<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodOrderUpdateRequest extends FormRequest
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
            'quantity' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
            'created_by_id' => ['required', 'max:255'],
            'member_id' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
            'mobile' => ['required', 'max:255', 'string'],
            'menu_names' => ['required', 'max:255', 'json'],
        ];
    }
}
