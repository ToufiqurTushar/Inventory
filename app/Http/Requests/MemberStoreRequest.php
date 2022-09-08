<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MemberStoreRequest extends FormRequest
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
            'email' => ['nullable', 'email'],
            'phone' => ['required', 'max:255', 'string'],
            'image' => ['nullable', 'image', 'max:1024'],
            'membership_no' => [
                'required',
                'unique:members,membership_no',
                'max:255',
                'string',
            ],
            'membership_type_id' => ['required', 'exists:membership_types,id'],
            'balance' => ['required', 'numeric'],
            'limit' => ['required', 'numeric'],
            'created_by_id' => ['nullable', 'max:255'],
        ];
    }
}
