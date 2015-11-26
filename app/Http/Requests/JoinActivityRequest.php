<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JoinActivityRequest extends Request
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
            'name'=>'required',
            'phone_number'=>'required|numeric|digits:11',
            'boys'=>'numeric',
            'girls'=>'numeric'
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'称呼',
            'phone_number'=>'联系电话',
            'boys'=>'同行伙伴',
            'girls'=>'同行伙伴',
            'user_id'=>'报名人员'
        ];
    }
}
