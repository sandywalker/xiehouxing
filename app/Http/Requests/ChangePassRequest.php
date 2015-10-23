<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ChangePassRequest extends Request
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
            'password' =>'required',
            'new_password' => 'required|min:6',
            'new_password_confirm' => 'required|min:6|same:new_password'
        ];
    }

    public function attributes()
    {
        return[
            'password' => '密码',
            'new_password' => '新密码',
            'new_password_confirm' => '确认新密码'
        ];

    }
}
