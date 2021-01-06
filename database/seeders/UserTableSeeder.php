<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([

            'name' => 'Antonio Lob',
            'email'=> 'lobustoantonio@gmail.com',
            'password'=>bcrypt('milano991'),

        ]);
    }
}
