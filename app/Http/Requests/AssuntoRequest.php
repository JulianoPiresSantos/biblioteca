<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssuntoRequest extends FormRequest
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
            'Descricao' => 'required|min:1|max:20'
        ];
    }

    public function attributes()
    {
        return [
            'Descricao' => 'Descricao'
        ];
    }

    public function messages()
    {
        return [
            'Descricao.required' => 'O campo :attribute é obrigatório',
            'Descricao.min' => 'O campo :attribute deve conter no mínimo 1 caractere',
            'Descricao.max' => 'O campo :attribute deve conter no máximo 20 caracteres'
        ];
    }
}
