<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiteRequest extends FormRequest
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
            'title' => ['required', 'between:3,30', Rule::unique('sites')->ignore(request()->site)],
            'domain' => ['required', 'url', Rule::unique('sites')->ignore(request()->site)],
        ];
    }

   public function attributes()
   {
       return [
           'title'=>'站点名称',
       ];
   }
}
