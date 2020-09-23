<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'email' => 'required|unique:users',
            'oldPassword' => 'required',
            'newPassword' => 'required',

        ];
    }
    public function messages()
    {
        return [

            'email.required' => 'Email is required!',
            'email.unique' => 'Email already exists!',
            'oldPassword.required' => 'Old Password is required!',
            'newPassword.required' => 'New Password is required!',

        ];
    }
}
