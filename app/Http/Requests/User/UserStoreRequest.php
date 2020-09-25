<?php

namespace App\Http\Requests\User;

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
            'name' => 'required',
            'oldPassword' => 'required',
            'newPassword' => 'required',

        ];
    }
    public function messages()
    {
        return [

            'name.required' => 'Name is required!',
            'oldPassword.required' => 'Old Password is required!',
            'newPassword.required' => 'New Password is required!',

        ];
    }
}
