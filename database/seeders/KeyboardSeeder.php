<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeyboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->mechanical(1);
        $this->optical(2);
        $this->membrane(3);
    }

    private function mechanical($category_id) {
        DB::table('keyboards')->insert([
            'name' => 'Keychron K2',
            'price' => 850000,
            'description' => 'K2 is a super tactile wireless or wired keyboard giving you all the keys and function you need while keeping it compact, with the largest battery seen in a mechanical keyboard.',
            'image' => 'public/images/keychronk2.jpg',
            'category_id' => $category_id,
        ]);
        DB::table('keyboards')->insert([
            'name' => 'NOIR N1',
            'price' => 1200000,
            'description' => 'A 65% Mechanical Keyboard for your peak productivity and gaming',
            'image' => 'public/images/noirn1.jpg',
            'category_id' => $category_id,
        ]);
        DB::table('keyboards')->insert([
            'name' => 'Tecware Phantom Elite',
            'price' => 750000,
            'description' => 'A TKL keyboard with good build quality and a variety of switches available off the shelves.',
            'image' => 'public/images/tecwarephantomelite.jpg',
            'category_id' => $category_id,
        ]);
        DB::table('keyboards')->insert([
            'name' => 'Cooler Master CK350',
            'price' => 750000,
            'description' => 'Budget mechanical keyboard from Cooler Master without unnecessary gimmick. ',
            'image' => 'public/images/coolermasterck350.jpg',
            'category_id' => $category_id,
        ]);
        DB::table('keyboards')->insert([
            'name' => 'Magicforce Smart 49',
            'price' => 800000,
            'description' => 'Exclusive Sale Magigforce Smart 49 Key 40% Mini USB Wired Backlit Mechanical Keyboard With Detacheable Cable Gateron/Cherry Axis.',
            'image' => 'public/images/magicforcesmart49.jpeg',
            'category_id' => $category_id,
        ]);
        DB::table('keyboards')->insert([
            'name' => 'Logitech G413',
            'price' => 950000,
            'description' => 'PURE. POWER. PLAY. Perfect balance between simplicity and capability.',
            'image' => 'public/images/logitechg413.jpeg',
            'category_id' => $category_id,
        ]);
        DB::table('keyboards')->insert([
            'name' => 'KBParadise V60',
            'price' => 1300000,
            'description' => 'Build by Costar, Cherry MX Switches, Double-Shot Keycaps.',
            'image' => 'public/images/kbparadisev60.jpg',
            'category_id' => $category_id,
        ]);
        DB::table('keyboards')->insert([
            'name' => 'GANSS GK87',
            'price' => 1600000,
            'description' => 'Stylish 360° RGB Underglow with Cherry MX Switch.',
            'image' => 'public/images/gansgk87.jpeg',
            'category_id' => $category_id,
        ]);
        DB::table('keyboards')->insert([
            'name' => 'Happy Hacking',
            'price' => 4300000,
            'description' => 'For Professional Use Keyboard. Made in Japan.',
            'image' => 'public/images/happyhacking.jpg',
            'category_id' => $category_id,
        ]);
    }

    private function optical($category_id) {
        DB::table('keyboards')->insert([
            'name' => 'Vissles LP85',
            'price' => 1500000,
            'description' => 'Introducing Vissles LP85,  a 75% ultra-slim optical-mechanical keyboard crafted for speed, precision, and comfort. The LP85 strives a perfect balance between a conventional and a mechanical keyboard, its low-profile optical switches give you the type feel of a mechanical keyboard but in an ergonomic way, and it helps prevent fatigue from long hours of typing.',
            'image' => 'public/images/vissleslp85.jpg',
            'category_id' => $category_id,
        ]);
        DB::table('keyboards')->insert([
            'name' => 'Keychron K3',
            'price' => 950000,
            'description' => 'World\'s First Hot-Swappable Low Profile Optical Wireless Mechanical Keyboard',
            'image' => 'public/images/keychronk3.webp',
            'category_id' => $category_id,
        ]);
    }

    private function membrane($category_id) {
        DB::table('keyboards')->insert([
            'name' => 'Armaggeddon AK666',
            'price' => 175000,
            'description' => 'Spill-proof gaming keyboard with 8 different backlight effects and colors. ',
            'image' => 'public/images/armaggeddonak666.jpg',
            'category_id' => $category_id,
        ]);

        DB::table('keyboards')->insert([
            'name' => 'HP K100',
            'price' => 150000,
            'description' => 'Keyboard with stylish design and integrated metal panel, rust, and scratch resistant.',
            'image' => 'public/images/hpk100.jpg',
            'category_id' => $category_id,
        ]);

        DB::table('keyboards')->insert([
            'name' => 'AULA S2056',
            'price' => 170000,
            'description' => 'Stylish design with responsive keys and comfortable hand feeling, more than 10 million times of button lifespan.',
            'image' => 'public/images/aulas2056.jpg',
            'category_id' => $category_id,
        ]);
    }
}
