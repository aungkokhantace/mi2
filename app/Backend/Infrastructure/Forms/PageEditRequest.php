<?php

namespace App\Backend\Infrastructure\Forms;

use App\Http\Requests\Request;

class PageEditRequest extends Request
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
            "name"              =>"required",
            "url"               =>"required|unique:pages,url,".$this->get('id'),
            "title"             =>"required",
            "page_menu_order"   =>"required",
            "events_id"         =>"required",
            "templates_id"      =>"required",
        ];
    }

    public function messages(){
        return [
            "name.required"             => "Page Name is required",
            "url.required"              => "Page URL is required",
            "url.unique"                => "Page URL is already occupied",
            "title.required"            => "Page Title is required",
            "page_menu_order.required"  => "Page Menu Order is required",
            "events_id.required"        => "Event is required",
            "templates_id.required"     => "Template is required",
        ];
    }
}
