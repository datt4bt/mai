<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'summary' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên đã tồn tại.Vui lòng chọn tên khác',
            'summary.required' => 'Tóm tắt không được để trống',
            'description.required' => 'Mô tả không được để trống',
        ];
    }
}

