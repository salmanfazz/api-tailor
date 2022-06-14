<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'email' => 'salman.fazzz@gmail.com',
            'password' => Hash::make('12345678'),
            'name' => 'Salman',
            'jenis_kelamin' => 'Laki Laki',
            'alamat' => 'Bandung',
            'no_hp' => '089649799600',
            'roles' => 'konsumen'
        ]);
    }
}
