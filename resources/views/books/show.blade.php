<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mx-auto w-max">
                    <p class="flex flex-col m-2">
                        <span>Title:</span>
                        <div>{{ $book->title }}</div>
                    </p>
                    <p class="flex flex-col m-2">
                        <span>Pages:</span>
                        <div>{{ $book->pages }}</div>
                    </p>
                    <p class="flex flex-col m-2">
                        <span>Release date:</span>
                        <div>{{ $book->release_date }}</div>
                    </p>
                    <p class="flex flex-col m-2">
                        <span>Price:</span>
                        <div>{{ $book->price }}</div>
                    </p>
                    <p class="flex flex-col m-2">
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