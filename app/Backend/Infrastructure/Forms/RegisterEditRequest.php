<?php

namespace App\Backend\Infrastructure\Forms;

use App\Http\Requests\Request;

class RegisterEditRequest extends Request
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "first_name" =>"required",
        ];
    }
    public function messages(){
        return [
            "first_name.required" => "Role Name is required",
        ];
    }
}
