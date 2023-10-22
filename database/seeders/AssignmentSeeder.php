<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Assignment::create([
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(2),
                'deadline' => $faker->dateTimeBetween('now', '+1 month'),
            ]);
        }
    }
}
