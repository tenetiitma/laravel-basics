<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = resource_path('json/authors.json');

        if (file_exists($filePath)) {
            
            $authors = collect(json_decode(file_get_contents($filePath), true));

            $authors->each(fn($author) =>  Author::updateOrCreate($author));
        }
    }
}
