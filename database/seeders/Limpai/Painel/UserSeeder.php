<?php

namespace Database\Seeders\Limpai\Painel;

use App\Models\Limpai\Painel\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::create([
        'name' => 'Administrador - Limpa ai',
        'email' => 'administrador@limpai.com',
        'password' => Hash::make('@admin123'),
        'cep' => '55000-000',
      ]);
    }
}