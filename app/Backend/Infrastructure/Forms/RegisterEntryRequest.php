<?php

namespace App\Backend\Infrastructure\Forms;

use App\Http\Requests\Request;

class RegisterEntryRequest extends Request
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
            "email" =>"required|email|unique:event_registrations",
            "country" => "required",
            "where_work" => "required",
            "medical_specialities" => "required",
            "phone_no" => "required",
            "registration_category" => "required",
            "payment_type" => "required",
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
            "where_work.required" => "Where you work is Required",
            "medical_specialities.required" => "Medication Specialities are Required",
            "phone_no.required" => "Phone No is Required",
            "registration_category.required" => "Registration Category is Required",
            "payment_type.required" => "Payment Type is Required",
        ];
    }
}
