<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GuideRequest extends Request
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
            'title' => 'required',
            'types' => 'required',
            'area' => 'required',
            'thumb' => 'required|image',
            'content' => 'required'
            
        ];
    }

     public function attributes()
    {
        return[
            'title' => '标题',
            'types' => '类型',
            'area' => '地区',
            'content' => '内容',
            'thumb' =>'预览图'
        ];

    }
}
