<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'phone' => 'required',
            'image' => 'mimes:png,jpg,webp,jpeg'
            
        ];
    }

    public function messages()
    {
       return [
            
        'first_name.required' => 'First Name field is required.',
        'phone.required' => 'Phone Number field is required.',

       ];

    }
}
