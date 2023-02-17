<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRestaurantRequest extends FormRequest
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
            'name' => ['required', Rule::unique('restaurant')->ignore($this->restaurant), 'string', 'max:150'],
            'address' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'telephone' => 'required|unique:restaurants|string|max:10', 
            'iva' => 'required|unique:restaurants|string|max:15', 
        ];
    }
}
