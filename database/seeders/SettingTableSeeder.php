<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::create([

            'name'=> 'Example.com',
            'copyright' => 'Copyright © 2021 All rights reserved',

        ]);
    }
}
