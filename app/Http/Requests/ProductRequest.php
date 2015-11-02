<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'place' => 'required',
            'tags' => 'required',
            'member_count' => 'required|number',
            'days' => 'required|number',
            'thumb' => 'required_without:id|image',
            'content' => 'required'
        ];
    }

     public function attributes()
    {
        return[
            'title' => '标题',
            'types' => '类型',
            'place' => '目的地',
            'tags' => '主题',
            'member_count' => '人数',
            'days' => '天数',
            'content' => '活动信息',
            'thumb' =>'预览图'
        ];

    }
}
