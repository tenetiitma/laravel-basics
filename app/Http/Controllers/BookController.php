<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', [
            'books' => Book::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book): View
    {
        $book = Book::with('authors')->where('id', $book->id)->first();

        return view('books.show', [
            'book' => $book,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book): View
    {
        $authors = Author::whereDoesntHave('books', function (Builder $query) use ($book) {
            $query->where('book_id', $book->id);
        })->orderBy("first_name")->get();

        return view('books.edit', [
            'book' => $book,
            'authors' => $authors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book): RedirectResponse
    {
        $validated = $request->validate(
            [
                'title' => 'required|string|max:255',
                'release_date' => 'required|integer|between:1901,2155',
                'price' => ['required', 'regex:/^\d+(,\d|,\d{2})?$/i'],
                'type' => 'required',
            ],
            [
                'release_date.between' => 'The release year field must be between 1901 - 2155',
                'release_date.required' => 'Please insert release year between 1901 - 2155',
            ]
        );
        $book->update($validated);

        return redirect(route('books.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }

    public function detachAuthor(Request $request, Book $book): RedirectResponse
    {
        $book->authors()->detach($request->author_id);
        return redirect()->back();
    }

    public function attachAuthor(Request $request, Book $book): RedirectResponse
    {
        $book->authors()->attach($request->author_id);
        return redirect()->back();
    }
}
