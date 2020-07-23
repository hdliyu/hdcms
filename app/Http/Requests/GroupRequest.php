<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GroupRequest extends FormRequest
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
            'title'=>['required','min:3','max:30',Rule::unique('groups')->ignore(request()->group)],
            'site_nums'=>['required','integer','min:1'],
            'days'=>['required','integer','min:1'],
        ];
    }

    public function attributes()
    {
        return [
            'title'=>'用户组',
        ];
    }


}
