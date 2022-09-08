<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipTypeStoreRequest extends FormRequest
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
            'type' => ['required', 'max:255', 'string'],
            'type_bn' => ['nullable', 'max:255', 'string'],
            'discount_rate' => ['required', 'numeric'],
            'created_by_id' => ['nullable', 'max:255'],
        ];
    }
}
