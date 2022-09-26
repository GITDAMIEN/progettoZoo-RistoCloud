<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewAnimalRequest extends FormRequest
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
            'newAnimalName' => 'required|min:3|max:40',
            'newAnimalDescription' => 'required|min:20|max:100',
            'newAnimalAge' => 'required|numeric|min:0|max:150',
            'category' => 'required',
            'newAnimalImage' => 'image|max:512'
        ];
    }

    public function messages()
    {
        return [
            'newAnimalName.required' => 'Il nome dell\'animale è obbligatorio',
            'newAnimalName.min' => 'Il nome dell\'animale dev\'essere di minimo 3 caratteri',
            'newAnimalName.max' => 'Il nome dell\'animale dev\'essere di massimo 40 caratteri',
            'newAnimalDescription.required' => 'La descrizione dell\'animale è obbligatoria',
            'newAnimalDescription.min' => 'La descrizione dell\'animale dev\'essere di minimo 20 caratteri',
            'newAnimalDescription.max' => 'La descrizione dell\'animale dev\'essere di massimo 100 caratteri',
            'newAnimalAge.required' => 'L\'età dell\'animale è obbligatoria',
            'newAnimalAge.numeric' => 'L\'età dell\'animale dev\'esseere un valore numerico',
            'newAnimalAge.min' => 'L\'età dell\'animale dev\'essere di minimo 0 anni',
            'newAnimalAge.max' => 'L\'età dell\'animale dev\'essere di massimo 150 anni',
            'category' => 'La categoria dell\'animale è obbligatoria',
            // 'newAnimalImage.required' => 'L\'immagine è obbligatoria',
            'newAnimalImage.image' => 'Il file dev\'essere di tipo immagine (jpg, jpeg, png, bmp, gif, svg, o webp)',
            'newAnimalImage.max' => 'L\'immagine può pesare al massimo 512kb',
        ];
    }
}
