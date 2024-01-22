<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\FacadesDB;
use Illuminate\Support\FacadesHash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'password' => \Hash::make('password')
        ]);
    }
}