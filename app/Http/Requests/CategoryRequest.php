<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'categoryName' => 'required|min:4|max:30',
            'categoryDescription' => 'required|min:20|max:100',
            'categoryImage' => 'image|max:512'
        ];
    }

    public function messages()
    {
        return [
            'categoryName.required' => 'Il nome della categoria è obbligatorio',
            'categoryName.min' => 'Il nome della categoria dev\'essere di minimo 4 caratteri',
            'categoryName.max' => 'Il nome della categoria dev\'essere di massimo 30 caratteri',
            'categoryDescription.required' => 'La descrizione della categoria è obbligatoria',
            'categoryDescription.min' => 'La descrizione della categoria dev\'essere di minimo 20 caratteri',
            'categoryDescription.max' => 'La descrizione della categoria dev\'essere di massimo 100 caratteri',
            // 'categoryImage.required' => 'L\'immagine è obbligatoria',
            'categoryImage.image' => 'Il file dev\'essere di tipo immagine (jpg, jpeg, png, bmp, gif, svg, o webp)',
            'categoryImage.max' => 'L\'immagine può pesare al massimo 512kb',
        ];
    }
}
