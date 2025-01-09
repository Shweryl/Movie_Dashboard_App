<?php

namespace Database\Seeders;

use App\Models\MovieType;
use Database\Factories\MovieTypeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['Series', 'Movies', 'TV-Series'];
        foreach($types as $type){
            MovieType::factory()->create([
                'name' => $type,
            ]);
        };
    }
}
