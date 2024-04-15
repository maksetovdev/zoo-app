<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class   animalStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'region_id' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required','string','max:255'],
            'longitude' => ['required', 'numeric', 'min:-180', 'max:180'],
            'latitude' => ['required', 'numeric', 'min:-90', 'max:90'],
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image'],
            'category_id' => ['required']
        ];
    }
}
