<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'phone' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'balance' => ['required', 'numeric'],
            'created_by_id' => ['required', 'max:255'],
        ];
    }
}
