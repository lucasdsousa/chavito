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
            'descricao' => 'Marque no calendário uma data que jamais deve ser esquecida.',
            'valor' => 20.00,
            'slug' => 'chavito-dia-especial'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_duplo.jpg',
            'title' => 'Chavito Duplo',
            'descricao' => 'Tenha no bolso as fotografias mais marcantes.',
            'valor' => 20.00,
            'slug' => 'chavito-duplo'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_frase.jpg',
            'title' => 'Chavito Frase',
            'descricao' => 'Carregue sempre seu lema com você.',
            'valor' => 20.00,
            'slug' => 'chavito-frase'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_nome.jpg',
            'title' => 'Chavito Nome',
            'descricao' => 'O clichê que todo mundo adora XD.',
            'valor' => 20.00,
            'slug' => 'chavito-nome'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_musica.jpg',
            'title' => 'Chavito Música',
            'descricao' => 'A sua música favorita eternizada e sempre com você.',
            'valor' => 20.00,
            'slug' => 'chavito-musica'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_frente_verso.jpg',
            'title' => 'Chavito Metal',
            'descricao' => 'As mais belas lembranças e sentimentos sempre com você.',
            'valor' => 20.00,
            'slug' => 'chavito-metal'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_casal.jpg',
            'title' => 'Chavito Casal',
            'descricao' => 'Aquele amor de cinema que vive pra sempre.',
            'valor' => 20.00,
            'slug' => 'chavito-casal'
        ]);
        DB::table('images')->insert([
            'image_name' => 'images/chavito_namorados.jpg',
            'title' => 'Chavito Namorados',
            'descricao' => 'As mais belas lembranças e sentimentos sempre com você.',
            'valor' => 20.00,
            'slug' => 'chavito-namorados'
        ]);
    }
}
