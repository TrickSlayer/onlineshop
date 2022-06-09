<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormProductRequest extends FormRequest
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
            "price" => "required",
            "sale_price" => "required",
            "file" => "image",
            "description" => "required",
            "thumb" => "required",
            "category_id" => "min:1",
        ];
    }

    public function messages()
    {
        return [
            "sale_price.required" => "Sale price is required", 
            "price.required" => "Price is required",
            "name.required" => "Category name is required",
            "description.required" => "Short description is required",
            "thumb.required" => "Picture is required",
            "file.image" => "File must be image",
            "category_id.min:1" => "Must choose category",
        ];
    }
}
