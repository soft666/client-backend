<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact')->insert([
            'name' => 'Admin',
            'address' => '21/70 m 6 asdsadasdsad',
            'phone' => '0989983238',
            'line' => 'admin',
            'facebook' => 'line',
            'email' => 'admin',
        ]);
    }
}
