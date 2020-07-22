<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => ['required', 'min:2', 'max:20', Rule::unique('packages')->ignore(request()->package)]
        ];
    }

//    public function messages()
//    {
//        return [
//            'name.required'=>'套餐名称不能为空',
//            'name.min'=>'套餐名称长度不能少于2位',
//            'name.max'=>'套餐名称长度不能超过20位',
//            'name.unique'=>'套餐已经存在',
//        ];
//    }

    public function attributes()
    {
        return ['title'=>'套餐名'];
    }

}
