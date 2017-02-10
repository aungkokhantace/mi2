<?php

namespace App\Backend\Infrastructure\Forms;

use App\Http\Requests\Request;

class PostEntryRequest extends Request
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
            "url"               =>"required|unique:posts",
            "title"             =>"required",
            "post_order"        =>"required",
            "pages_id"          =>"required"
        ];
    }

    public function messages(){
        return [
            "name.required"             => "Post Name is required",
            "url.required"              => "Post URL is required",
            "url.unique"                => "Post URL is already occupied",
            "title.required"            => "Post Title is required",
            "post_order.required"       => "Post Order is required",
            "pages_id.required"         => "Page is required",
        ];
    }
}
