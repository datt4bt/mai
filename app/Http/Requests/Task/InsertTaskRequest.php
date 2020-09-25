<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class InsertTaskRequest extends FormRequest
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
            'name' => 'required|unique:task',
            'description' => 'required',
            'idCategory' => 'unique:task',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'name.unique' => 'Name already exists!',
            'description.required' => 'Description is required!',
            'idCategory.unique' => 'Category already exists!',
        ];
    }
}
