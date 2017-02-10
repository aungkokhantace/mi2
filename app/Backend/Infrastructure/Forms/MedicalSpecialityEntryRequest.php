<?php

namespace App\Backend\Infrastructure\Forms;

use App\Http\Requests\Request;

class MedicalSpecialityEntryRequest extends Request
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
//            "option_group_name" =>"required"
        ];
    }

    public function messages(){
        return [
            "name.required" => "Medical Speciality Name is required",
//            "option_group_name.required" => "Option Group Name is required"
        ];
    }
}
