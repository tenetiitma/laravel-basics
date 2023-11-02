<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>
                        <span>Title:</span>
                        <div>{{ $book->title }}</div>
                    </p>
                    <p>
                        <span>Pages:</span>
                        <div>{{ $book->pages }}</div>
                    </p>
                    <p>
                        <span>Release date:</span>
                        <div>{{ $book->release_date }}</div>
                    </p>
                    <p>
                        <span>Price:</span>
                        <div>{{ $book->price }}</div>
                    </p>
                    <p>
                        <span>Authors:</span>
                        @foreach ($book->authors as $author)
                        <div>
                            {{ $author->first_name }}
                            {{ $author->last_name }}
                        </div>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>