<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
            'title'=>['required','between:3,50',Rule::unique('roles')->ignore(request()->role)],
            'name'=>['required','between:3,50','regex:/^[0-9A-z\-]+$/',Rule::unique('roles')->ignore(request()->role)],
        ];
    }

    public function attributes()
    {
        return [
            'name'=>'角色标识',
            'title'=>'角色名称',
        ];
    }

    public function messages()
    {
        return [
            'name.regex'=>'角色标识只能包含字母数字和中划线',
        ];
    }
}
