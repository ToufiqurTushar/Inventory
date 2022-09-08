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
            'price' => ['required', 'numeric'],
            'special_discount' => ['required', 'numeric'],
            'discounted_price' => ['required', 'numeric'],
            'vat_rate' => ['required', 'numeric'],
            'vat' => ['required', 'numeric'],
            'mobile' => ['required', 'max:255', 'string'],
            'menu_names' => ['required', 'max:255', 'json'],
            'payable_amount' => ['required', 'numeric'],
            'payment_type' => ['nullable', 'max:255', 'string'],
            'payment_status' => ['nullable', 'max:255', 'string'],
            'net_sale_price' => ['required', 'numeric'],
            'created_by_id' => ['required', 'max:255'],
        ];
    }
}
