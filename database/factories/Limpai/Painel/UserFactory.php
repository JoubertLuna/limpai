<?php

namespace Database\Factories\Limpai\Painel;

use App\Models\Limpai\Painel\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Limpai\Painel\User>
 */
class UserFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  protected $model = User::class;

  public function definition(): array
  {
    return [
      'name' => $this->faker->unique()->name(),
      'email' => fake()->unique()->safeEmail(),
      'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
      'cpf' => Str::random(18),
      'rg' => Str::random(10),
      'fone' => Str::random(14),
      'celular' => Str::random(15),
      'cep' => Str::random(14),
      'logradouro' => $this->faker->sentence(10),
      'numero' => Str::random(2),
      'uf' => Str::random(2),
      'cidade' => $this->faker->sentence(10),
      'complemento' => $this->faker->sentence(10),
      'bairro' => $this->faker->sentence(10),
    ];
  }
}
