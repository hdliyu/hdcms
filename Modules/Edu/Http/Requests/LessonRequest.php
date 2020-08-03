<?php

namespace Modules\Edu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'between:10,100'],
            'thumb' => ['required'],
            'free_num' => ['required', 'max:200'],
            'description' => ['required', 'min:10', 'max:100'],
            'download_address' => ['nullable', 'url'],
        ];
    }

    public function messages()
    {
        return ['download_address.url' => '请输入网址', 'free_num.required' => '免费观看数量不能为空'];
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
