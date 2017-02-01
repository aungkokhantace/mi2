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
            "name"   =>"required",
            "status" => 'required',
            "url"    => 'required',
            "title"  => 'required',
        ];
    }
    public function messages(){
        return [
            "name.required"         => "Event Name is required",
            "status.required"       => 'Event Status is required',
            "url.required"          => 'Event URL is required',
            "title.required"        => 'Event Title is required',
        ];
    }
}
