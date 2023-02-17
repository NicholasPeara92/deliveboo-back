<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'description' => 'required|text',
            'image' => 'nullable|image|max:2048',
            'price' => 'required|decimal|min:0.10',
            'is_available' => 'required|boolean', 
        ];
    }
}
