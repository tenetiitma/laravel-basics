<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $filePath = resource_path('json/books.json');
        
        if (file_exists($filePath)) {
            
            $books = collect(json_decode(file_get_contents($filePath), true));
            
            $books->each(fn ($book) => Book::updateOrCreate($book));
        }
        
        $this->attatchAuthors();
        // Book::factory(100000)->create();
    }

    protected function attatchAuthors(): void
    {
        $filePath = resource_path('json/book_authors.json');

        if (file_exists($filePath)) {
            $authors = Author::all()->keyBy('id');
            $bookAuthors = collect(json_decode(file_get_contents($filePath), true));

            $authorBooks = $bookAuthors->mapToGroups(function($bookAuthor){
                return [
                    $bookAuthor['author_id'] => $bookAuthor['book_id']
                ];
            });
            $authorBooks->each(function(Collection $books, string $key) use($authors){
                $authors->get($key)->books()->sync($books);
            });
        
        }
    }
}
