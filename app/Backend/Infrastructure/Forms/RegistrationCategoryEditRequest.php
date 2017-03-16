<?php

namespace App\Backend\Infrastructure\Forms;

use App\Http\Requests\Request;

class RegistrationCategoryEditRequest extends Request
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
            "name"              => "required",
            "currency_type"     => "required",
            "early_bird_fee"    => "required|numeric",
            "normal_fee"        => "required|numeric",
            "on_site_fee"       => "required|numeric",
        ];
    }

    public function messages(){
        return [
            "name.required"                 => "Registration Category Name is required",
            "currency_type.required"        => "Currency Type is required",
            "early_bird_fee.required"       => "Early Bird Fee is required",
            "early_bird_fee.numeric"        => "Early Bird Fee must be numeric",
            "normal_fee.required"           => "Normal Fee is required",
            "normal_fee.numeric"            => "Normal Fee must be numeric",
            "on_site_fee.required"          => "On Site Fee is required",
            "on_site_fee.numeric"           => "On Site Fee must be numeric",
        ];
    }
}
