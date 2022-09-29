<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
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
            'animalName' => 'required|min:3|max:40|unique:animals,name',
            'animalDescription' => 'required|min:20|max:100',
            'animalAge' => 'required|numeric|min:0|max:150',
            'category' => 'required|exists:categories,id',
            'animalImage' => 'image|max:512'
        ];
    }

    public function messages()
    {
        return [
            'animalName.required' => 'Il nome dell\'animale è obbligatorio',
            'animalName.min' => 'Il nome dell\'animale dev\'essere di minimo 3 caratteri',
            'animalName.max' => 'Il nome dell\'animale dev\'essere di massimo 40 caratteri',
            'animalName.unique' => 'Esiste già un animale con questo nome',
            'animalDescription.required' => 'La descrizione dell\'animale è obbligatoria',
            'animalDescription.min' => 'La descrizione dell\'animale dev\'essere di minimo 20 caratteri',
            'animalDescription.max' => 'La descrizione dell\'animale dev\'essere di massimo 100 caratteri',
            'animalAge.required' => 'L\'età dell\'animale è obbligatoria',
            'animalAge.numeric' => 'L\'età dell\'animale dev\'esseere un valore numerico',
            'animalAge.min' => 'L\'età dell\'animale dev\'essere di minimo 0 anni',
            'animalAge.max' => 'L\'età dell\'animale dev\'essere di massimo 150 anni',
            'category.required' => 'La categoria dell\'animale è obbligatoria',
            'category.exists' => 'Questa categoria non esiste',
            // 'animalImage.required' => 'L\'immagine è obbligatoria',
            'animalImage.image' => 'Il file dev\'essere di tipo immagine (jpg, jpeg, png, bmp, gif, svg, o webp)',
            'animalImage.max' => 'L\'immagine può pesare al massimo 512kb',
            'animalImage.type' => 'L\'immagine deve essere di uno dei seguenti formati: jpg,jpeg,png',
        ];
    }
}
