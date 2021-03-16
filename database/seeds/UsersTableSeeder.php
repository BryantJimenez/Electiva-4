<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Super',
            'photo' => 'usuario.png',
            'slug' => 'super-admin',
            'user' => 'admin',
            'dni' => '27187524',
            'phone' => '000000000',
            'address' => 'My House',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'state' => '1',
            'type' => 1
        ]);
    }
}
