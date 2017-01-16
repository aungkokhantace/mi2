<?php

namespace App\Backend\Infrastructure\Forms;

use App\Http\Requests\Request;

class EventEntryRequest extends Request
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "name" =>"required",
        ];
    }
    public function messages(){
        return [
            "name.required" => "Role Name is required",
        ];
    }
}
