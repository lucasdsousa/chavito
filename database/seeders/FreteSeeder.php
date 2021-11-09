<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FreteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fretes')->insert([
            'uf' => 'BA',
            'valor' => 16.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'SE',
            'valor' => 20.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'AL',
            'valor' => 20.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'PE',
            'valor' => 20.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'PB',
            'valor' => 20.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'RN',
            'valor' => 20.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'CE',
            'valor' => 20.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'PI',
            'valor' => 20.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'MA',
            'valor' => 20.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'SP',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'RJ',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'ES',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'MG',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'PR',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'SC',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'RS',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'MS',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'GO',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'DF',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'MT',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'TO',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'PA',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'AP',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'RR',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'AM',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'RO',
            'valor' => 25.00
        ]);
        DB::table('fretes')->insert([
            'uf' => 'AC',
            'valor' => 25.00
        ]);
    }
}
