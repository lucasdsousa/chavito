<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nomeCategoria' => "Chavito",
            'imagemExemplo' => "images/chavito_instagram.jpeg"
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => "Pin",
            'imagemExemplo' => "images/"
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => "Caixa",
            'imagemExemplo' => "images/"
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => "Suporte Phone",
            'imagemExemplo' => "images/"
        ]);
    }
}
