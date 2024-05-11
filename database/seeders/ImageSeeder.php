<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('image')->delete();
        DB::statement('alter table image auto_increment = 1');
        $image = [
            [
                'image' => '1.jpg',
                'name' => 'Nature',
            ],
            [
                'image' => '2.jpg',
                'name' => 'Red Heartbeat',
            ],
            [
                'image' => '3.jpg',
                'name' => 'Blue Dream',
            ],
            [
                'image' => '4.jpg',
                'name' => 'Christian Church',
            ],
            [
                'image' => '5.jpg',
                'name' => 'Red Darkness',
            ],
            [
                'image' => '6.jpg',
                'name' => 'Beauty with Brain',
            ],
            [
                'image' => '7.jpg',
                'name' => 'Remarkable',
            ],
            [
                'image' => '8.jpg',
                'name' => 'Peaceful',
            ],
            [
                'image' => '9.jpg',
                'name' => 'Dreamy',
            ],
            [
                'image' => '10.jpg',
                'name' => 'Bubbly',
            ],
            [
                'image' => '11.jpg',
                'name' => 'Nature',
            ],
            [
                'image' => '12.jpg',
                'name' => 'Nature',
            ],
        ];

        DB::table('image')->insert($image);
    }
}
