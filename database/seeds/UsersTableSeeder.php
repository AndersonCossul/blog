<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name'  => 'Anderson',
            'email' => 'anderson_cossul@hotmail.com',
            'password'  => bcrypt('password')
        ]);
    }
}
