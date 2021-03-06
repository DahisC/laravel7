<?php

use App\User;
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
        User::create([
            'name' => 'Dahis',
            'email' => 'dahischeng@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('a'),
        ]);
    }
}
