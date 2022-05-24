<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCategoryRequest extends FormRequest
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
            "name" => "required",
            "file" => "image",
            "description" => "required",
            "thumb" => "required",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Category name is required",
            "description.required" => "Short description is required",
            "thumb.required" => "Picture is required",
            "file.image" => "File must be image",
        ];
    }
}
