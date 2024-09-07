<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;
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
            'Titulo' => 'required|min:1|max:40',
            'Editora' => 'required|min:1|max:40',
            'Edicao' => 'required',
            'AnoPublicacao' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'Titulo' => 'Titulo',
            'Editora' => 'Editora',
            'Edicao' => 'Edicao',
            'AnoPublicacao' => 'AnoPublicacao'
        ];
    }

    public function messages()
    {
        return [
            'Titulo.required' => 'O campo :attribute é obrigatório',
            'Titulo.min' => 'O campo :attribute deve conter no mínimo 1 caractere',
            'Titulo.max' => 'O campo :attribute deve conter no máximo 40 caracteres',
            'Editora.required' => 'O campo :attribute é obrigatório',
            'Editora.min' => 'O campo :attribute deve conter no mínimo 1 caractere',
            'Editora.max' => 'O campo :attribute deve conter no máximo 40 caracteres',
            'Edicao.required' => 'O campo :attribute é obrigatório',
            'AnoPublicacao.required' => 'O campo :attribute é obrigatório',
        ];
    }
}
