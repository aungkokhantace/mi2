<?php

namespace App\Backend\Infrastructure\Forms;

use App\Http\Requests\Request;

class AbstractformEntryRequest extends Request
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "first_name" =>"required",
            "last_name" => "required",
            "email" =>"required|email|unique:event_abstract",
            "country" => "required",
            "medical_specialities" => "required",
        ];
    }
    public function messages(){
        return [
            "first_name.required" => "First Name is required",
            "email.email" => "Email is not valid",
            "email.unique" => "Email is already occupied",
            "email.required" => "Email is required",
            "last_name.required" => "Last Name is Required",
            "country.required" => "Country is Required",
            "medical_specialities.required" => "Medication Specialities are Required",
        ];
    }
}
