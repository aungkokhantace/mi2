<?php

namespace App\Backend\Infrastructure\Forms;

use App\Http\Requests\Request;

class TemplateSliderEditRequest extends Request
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
        ];
    }

    public function messages(){
        return [
            "name.required" => "Template Slider Name is required",
            "template_id.required" => "Slider Template is required",
        ];
    }
}
