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
            'email'=>'required|min:8|max:50|email',
            'message'=>'required|min:20',
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Il nome è obbligatorio',
            'name.max'=>"Il nome dev'essere di massimo 50 caratteri",
            'name.min'=>"Il nome dev'essere di minimo 3 caratteri",
            'email.required'=>"L'indirizzo email è obbligatorio",
            'email.min'=>"La mail dev'essere di minimo 8 caratteri",
            'email.max'=>"La mail dev'essere di massimo 50 caratteri",
            'email.email'=>"Inserisci un'indirizzo email valido",
            'message.required'=>"Il messaggio è obbligatorio",
            'message.min'=>"Il messaggio dev'essere di minimo 20 caratteri",
        ];
    }
}
