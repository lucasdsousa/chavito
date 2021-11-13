<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Gabi',
            'email' => 'admin.gabi@admin.com',
            'user_type' => 'ADMIN',
            'password' => Hash::make('999999999'),
        ]);
    }
}
