<?php

namespace App\Http\Requests\Limpai\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServiceRequest extends FormRequest
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
      'nome' => "required|min:3|max:255|unique:services,nome,{$id},id",
      'icone' => 'required', Rule::in(['twf-cleaning-1', 'twf-cleaning-2', 'twf-cleaning-3']),
      'posicao' => 'required|integer|min:1|max:99',
      'valor_minimo' => "required|numeric|regex:/^\d+(\.\d{1,2})?$/",
      'quantidade_horas' => 'required|integer|min:1|max:8',
      'porcentagem' => 'required|integer|min:1|max:99',
      'valor_quarto' => "required|numeric|regex:/^\d+(\.\d{1,2})?$/",
      'horas_quarto' => 'required|integer|min:1|max:8',
      'valor_sala' => "required|numeric|regex:/^\d+(\.\d{1,2})?$/",
      'horas_sala' => 'required|integer|min:1|max:8',
      'valor_cozinha' => "required|numeric|regex:/^\d+(\.\d{1,2})?$/",
      'horas_cozinha' => 'required|integer|min:1|max:8',
      'valor_banheiro' => "required|numeric|regex:/^\d+(\.\d{1,2})?$/",
      'horas_banheiro' => 'required|integer|min:1|max:8',
      'valor_quintal' => "required|numeric|regex:/^\d+(\.\d{1,2})?$/",
      'horas_quintal' => 'required|integer|min:1|max:8',
      'valor_outros' => "required|numeric|regex:/^\d+(\.\d{1,2})?$/",
      'horas_outros'  => 'required|integer|min:1|max:8'
    ];
  }

  public function validationData()
  {
    $dados = $this->all();

    $dados['valor_minimo'] = $this->formataValorMonetario($dados['valor_minimo']);
    $dados['valor_quarto'] = $this->formataValorMonetario($dados['valor_quarto']);
    $dados['valor_sala'] = $this->formataValorMonetario($dados['valor_sala']);
    $dados['valor_cozinha'] = $this->formataValorMonetario($dados['valor_cozinha']);
    $dados['valor_banheiro'] = $this->formataValorMonetario($dados['valor_banheiro']);
    $dados['valor_quintal'] = $this->formataValorMonetario($dados['valor_quintal']);
    $dados['valor_outros'] = $this->formataValorMonetario($dados['valor_outros']);

    $this->replace($dados);
    return $dados;
  }

  /**
   * formatação dos valores monetários
   */
  protected function formataValorMonetario(string $valor)
  {
    return str_replace(['.', ','], ['', '.'], $valor);
  }
}
