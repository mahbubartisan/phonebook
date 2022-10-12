<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|min:6|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:12',
        ];
    }

    public function messages()
    {
       return [
            
        'name.required' => 'Username field is required.',
        'name.min' => 'Username must contain at least 6 characters.',
        'name.unique' => 'Sorry! selected username has already been taken.',
        'email.required' => 'Email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'Please enter an unique email address.',
        'password.required' => 'Password field is required.',
        'password.min' => 'Password must has at least 6 characters.',
        'password.max' => 'Password should not has more than 12 characters.',
        // 'password.unique' => 'Please enter an unique email address.',

       ];

    }
}
