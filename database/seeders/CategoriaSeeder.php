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
            'imagemExemplo' => "images/3-IMG_8633.jpg"
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => "Acrypin",
            'imagemExemplo' => "images/39-IMG_8699.jpg"
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => "Chavito Pet",
            'imagemExemplo' => "images/33-IMG_8686.jpg"
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => "Caixa",
            'imagemExemplo' => "images/"
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => "Placa Spotify",
            'imagemExemplo' => "images/"
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => "Placas",
            'imagemExemplo' => "images/41-IMG_8705.jpg"
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => "Suporte Phone",
            'imagemExemplo' => "images/"
        ]);
    }
}
