<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres =
            [
                "Action",
                "Adventure",
                "Animated",
                "Biography",
                "Comedy",
                "Crime",
                "Dance",
                "Disaster",
                "Documentary",
                "Drama",
                "Erotic",
                "Family",
                "Fantasy",
                "Found Footage",
                "Historical",
                "Horror",
                "Independent",
                "Legal",
                "Live Action",
                "Martial Arts",
                "Musical",
                "Mystery",
                "Noir",
                "Performance",
                "Political",
                "Romance",
                "Satire",
                "Science Fiction",
                "Short",
                "Silent",
                "Slasher",
                "Sports",
                "Spy",
                "Superhero",
                "Supernatural",
                "Suspense",
                "Teen",
                "Thriller",
                "War",
                "Western"
        ];

        foreach($genres as $genre){
            Genre::factory()->create([
                'name' => $genre,
                'admin_id' => 1,
            ]);
        }
    }
}
