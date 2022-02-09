<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeyboardCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keyboard_categories')->insert([
            'name' => 'Mechanical Keyboard',
            'image' => 'public/images/Mechanical.jpg',
        ]);

        DB::table('keyboard_categories')->insert([
            'name' => 'Optical Keyboard',
            'image' => 'public/images/Optical.jpg',
        ]);

        DB::table('keyboard_categories')->insert([
            'name' => 'Membrane Keyboard',
            'image' => 'public/images/Membrane.jpg',
        ]);

    }
}
