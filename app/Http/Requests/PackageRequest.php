<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'name'=>['required','min:2','max:20','unique:packages'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'套餐名称不能为空',
            'name.min'=>'套餐名称长度不能少于2位',
            'name.max'=>'套餐名称长度不能超过20位',
            'name.unique'=>'套餐已经存在',
        ];
    }
}
