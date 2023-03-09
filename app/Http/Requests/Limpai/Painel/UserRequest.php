<?php

namespace App\Http\Requests\Limpai\Painel;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules(): array
  {
    $id = $this->segment(2);

    return [
      'name' => ['required', 'string', 'max:255'],
      'email' => "required|string|email|min:3|max:255|unique:users,email,{$id},id",
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'rg' => 'nullable|min:9|max:10|',
      'cpf' => 'nullable|min:14|max:14|',
      'cep' => 'required|min:9|max:10|',
      'logradouro' => 'nullable|max:200|',
      'numero' => 'nullable|numeric',
      'uf' => 'nullable|min:2|max:2|',
      'cidade' => 'nullable|max:200|',
      'complemento' => 'nullable|max:200|',
      'bairro' => 'nullable|max:200|',
      'fone' => 'nullable|min:14|max:14|',
      'celular' => 'nullable|min:15|max:15|',
      'image' => 'nullable|max:2048|',
    ];
  }
}
