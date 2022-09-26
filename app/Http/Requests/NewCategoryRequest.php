<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCategoryRequest extends FormRequest
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
            'newCategoryName' => 'required|min:4|max:30',
            'newCategoryDescription' => 'required|min:20|max:100',
            'newCategoryImage' => 'image|max:512'
        ];
    }

    public function messages()
    {
        return [
            'newCategoryName.required' => 'Il nome della categoria è obbligatorio',
            'newCategoryName.min' => 'Il nome della categoria dev\'essere di minimo 4 caratteri',
            'newCategoryName.max' => 'Il nome della categoria dev\'essere di massimo 30 caratteri',
            'newCategoryDescription.required' => 'La descrizione della categoria è obbligatoria',
            'newCategoryDescription.min' => 'La descrizione della categoria dev\'essere di minimo 20 caratteri',
            'newCategoryDescription.max' => 'La descrizione della categoria dev\'essere di massimo 100 caratteri',
            // 'newCategoryImage.required' => 'L\'immagine è obbligatoria',
            'newCategoryImage.image' => 'Il file dev\'essere di tipo immagine (jpg, jpeg, png, bmp, gif, svg, o webp)',
            'newCategoryImage.max' => 'L\'immagine può pesare al massimo 512kb',
        ];
    }
}
