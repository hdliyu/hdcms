<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscribeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>['required',Rule::unique('edu_subscribe')->ignore(request()->subscribe)],
            'icon'=>['required'],
            'price'=>['required','integer'],
            'month'=>['required','integer'],
            'ad'=>['required','max:200'],
        ];
    }

    public function attributes()
    {
        return [
            'icon'=>'图标',
            'price'=>'价格',
            'month'=>'套餐月数',
            'ad'=>'套餐介绍',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
