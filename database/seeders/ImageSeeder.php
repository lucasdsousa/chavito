<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'image_name' => 'images/chavito_dia_especial.jpg',
            'title' => 'Chavito Dia Especial',
            'descricao' => 'Marque no calendário uma data que jamais deve ser esquecida.'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_duplo.jpg',
            'title' => 'Chavito Duplo',
            'descricao' => 'Tenha no bolso as fotografias mais marcantes.'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_frase.jpg',
            'title' => 'Chavito Frase',
            'descricao' => 'Carregue sempre seu lema com você.'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_nome.jpg',
            'title' => 'Chavito Nome',
            'descricao' => 'O clichê que todo mundo adora XD.'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_musica.jpg',
            'title' => 'Chavito Música',
            'descricao' => 'A sua música favorita eternizada e sempre com você.'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_frente_verso.jpg',
            'title' => 'Chavito Metal',
            'descricao' => 'As mais belas lembranças e sentimentos sempre com você.'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_casal.jpg',
            'title' => 'Chavito Casal',
            'descricao' => 'Aquele amor de cinema que vive pra sempre.'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_namorados.jpg',
            'title' => 'Chavito Namorados',
            'descricao' => 'As mais belas lembranças e sentimentos sempre com você.'
        ]);
    }
}
