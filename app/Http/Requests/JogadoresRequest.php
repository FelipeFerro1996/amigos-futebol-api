<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JogadoresRequest extends FormRequest
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
            'nome' => 'required',
            'email' => 'required|email|unique:jogadores,email,'.$this->route('jogadore'),
            'posicao' => 'required|min:1|max:10',
            'nivel' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'=>'O Nome é obrigatório',
            'email.required'=>'O Email é obrigatório',
            'email.email'=>'Informe um email válido',
            'email.unique'=>'Email já cadastrado',
            'posicao.required'=>'A posição é obrigatória',
            'posicao.min'=>'Informe uma posição entre 1 e 10',
            'posicao.max'=>'Informe uma posição entre 1 e 10',
            'posicao.nivel'=>'o nível é obrigatório',
        ];
    }
}
