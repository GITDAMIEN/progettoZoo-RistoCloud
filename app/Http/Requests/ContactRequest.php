<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name'=>'required|min:3|max:50',
            'email'=>'required|min:2|max:50|email',
            'message'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return[
            'title.required'=>'Il titolo è obbligatorio',
            'author.required'=>"L'autore è obbligatorio",
            'pages.required'=>'Il numero di pagine è obbligatorio',
            'publisher.required'=>"L'editore è obbligatorio",
            'title.min'=>"Il titolo dev'essere di minimo 2 caratteri",
            'author.min'=>"L'autore dev'essere di minimo 2 caratteri",
            'publisher.min'=>"L'editore dev'essere di minimo 2 caratteri",
            'title.max'=>"Il titolo dev'essere di massimo 50 caratteri",
            'author.max'=>"L'autore dev'essere di massimo 50 caratteri",
            'publisher.max'=>"L'editore dev'essere di massimo 50 caratteri",
            'pages.numeric'=>"Le pagine devono essere un valore numerico",
            'img.required'=>"L'immagine è obbligatoria",
            'img.image'=>"Il file dev'essere in formato immagine (jpg, jpeg, png, bmp, gif, svg, o webp)"
        ];
    }
}
