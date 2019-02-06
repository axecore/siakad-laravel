<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Aldi Revaldy',
            'email' => 'aldi@aldi.com',
            'password' => \Hash::make('123456'),
        ]);
    }
}
