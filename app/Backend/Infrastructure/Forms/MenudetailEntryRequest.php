<?php

namespace App\Backend\Infrastructure\Forms;

use App\Http\Requests\Request;

class MenudetailEntryRequest extends Request
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
            "menu"                  => "required",
            "page_url"              => "required",
            "menu_order"            => "required",
            "status"                => "required",
            "menu_group"            => "required",
            "menu_group_order"      => "required",
            "name"                  => "required"
        ];
    }

    public function messages(){
        return [
            "menu.required" => "Menu Name is required",
            "page_url.required" => "Page URL is required",
            "menu_order.required" => "Menu Order is required",
            "status.required" => "Status is required",
            "menu_group.required" => "Menu Group is required",
            "menu_group_order.required" => "Menu Group Order is required",
            "name.required" => "Name is required"
        ];
    }
}
