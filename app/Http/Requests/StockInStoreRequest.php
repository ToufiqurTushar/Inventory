<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockInStoreRequest extends FormRequest
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
            'created_by_id' => ['required', 'max:255'],
            'Product_type' => ['required', 'max:255', 'string'],
            'expiry_days' => ['required', 'numeric'],
            'initial_stock' => ['required', 'numeric'],
            'alerm_stock' => ['required', 'numeric'],
            'm_by_u' => ['required', 'max:255', 'string'],
            'product_image' => ['image', 'max:1024', 'required'],
        ];
    }
}
