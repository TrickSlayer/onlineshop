<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCommentRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "star" => "required|digits_between:0,5",
            "thumb" => "required",
            "content" => "required",
        ];
    }

    public function messages()
    {
        return [
            "thumb.required" => "Picture is required",          
            "content.required" => "Comment is required",
            "star.digits_between:0,5" => "Invalid score",
        ];
    }
}
