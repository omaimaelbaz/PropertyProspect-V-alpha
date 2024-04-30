<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'year_built' => 'required',
            'size_area' => 'required',
            'num_bedrooms' => 'required',
            'num_bathrooms' => 'required',
            'status' => 'required',
            'price' => 'required',
            'description' => 'required',

        ];

    }
}
