<?php

namespace App\Backend\Infrastructure\Forms;

use App\Http\Requests\Request;

class TemplateSideBarMenuEntryRequest extends Request
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
            "name" =>"required",
            "template_id" =>"required",
            "page_id" =>"required",
            "menu_order" =>"required",
            "menu_parent_id" =>"required",
        ];
    }

    public function messages(){
        return [
            "name.required" => "Template Sidebar Menu Name is required",
            "template_id.required" => "Template is required",
            "page_id.required" => "Page is required",
            "menu_order.required" => "Menu Order is required",
            "menu_parent_id.required" => "Menu Parent is required",
        ];
    }
}
