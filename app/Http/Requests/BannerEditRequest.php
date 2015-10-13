<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BannerEditRequest extends Request
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
            'tag' => 'required',
            'link' => 'url',
            'orders' => 'integer'
        ];
    }

    public function attributes()
    {
        return[
            'title' => '标题',
            'tag' => '标签',
            'link' => '链接',
            'orders' =>'排序'
        ];

    }
}
