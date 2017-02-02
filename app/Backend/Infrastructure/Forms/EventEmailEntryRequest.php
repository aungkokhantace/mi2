<?php

namespace App\Backend\Infrastructure\Forms;

use App\Http\Requests\Request;

class EventEmailEntryRequest extends Request
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
            'email' => "required|email|unique:event_emails",
            "type"  =>"required",
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Event Email is required',
            'email.unique'   => 'Event Email is already occupied',
            'email.email'    => 'Event Email is not valid',
            "type.required"  => "Event Email Type is required",
        ];
    }
}
