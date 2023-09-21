<?php

namespace Database\Seeders;

use App\Models\projects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class projectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 3; $i++) {
            # code...
            projects::insert(
                [
                    'name' => 'test',
                    'intro' => 'dit is een test',
                    'description' => 'description',
                    'date_started' => date("Y/m/d"),
                    'updated_at' => date("Y/m/d"),
                    'created_at' => date("Y/m/d")
                ]
            );
        }
    }
}
