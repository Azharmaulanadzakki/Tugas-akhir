<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapels = [
            [
                'judul' => 'UI/UX Design Fundamentals',
                'harga' => 199000,
                'description' => 'Learn the basics of UI/UX design with practical examples.',
                'image' => 'https://source.unsplash.com/random/800x600',
            ],
            [
                'judul' => 'Prototyping with Figma',
                'harga' => 149000,
                'description' => 'Hands-on guide to prototyping using Figma.',
                'image' => 'https://source.unsplash.com/random/800x601',
            ],
            // Add more mapels as needed
            // ...

            // Add 18 more mapels
            // Example:
            [
                'judul' => 'Web Development Basics',
                'harga' => 159000,
                'description' => 'Introduction to web development concepts.',
                'image' => 'https://source.unsplash.com/random/800x602',
            ],
            [
                'judul' => 'Responsive Design',
                'harga' => 129000,
                'description' => 'Create responsive websites with CSS media queries.',
                'image' => 'https://source.unsplash.com/random/800x603',
            ],
            // Continue adding more mapels as needed
            // ...
        ];

        foreach ($mapels as $mapel) {
            DB::table('mapels')->insert($mapel);
        }
    }
}
