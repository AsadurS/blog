<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->createUser();
    }

    protected function createUser(){
        User::create([
            'name'              => 'korim',
            'email'             => 'admin@gmail.com',
            'password'          => bcrypt(123456789)
        ]);
    }
}
