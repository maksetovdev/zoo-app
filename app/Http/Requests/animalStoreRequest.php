<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class animalStoreRequest extends FormRequest
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
            'name' => ['required'],
            'region_id' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required','string','max:255'],
            'longitude' => ['required', 'numeric', 'min:-180', 'max:180'],
            'latitude' => ['required', 'numeric', 'min:-90', 'max:90'],
            'img' => ['required', 'image'],
            'category_id' => ['required']
        ];
    }
}
