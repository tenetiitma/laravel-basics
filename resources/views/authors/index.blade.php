<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Authors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <x-primary-button class="mb-6 bg-slate-600">Lisa Autor</x-primary-button>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        @foreach ($authors as $author)
                        <li>
                            <div class="flex border-b justify-between items-center">
                                <p>{{$author->first_name}} {{$author->last_name}}</p>
                                <div class="grid grid-cols-2 gap-2 pt-2">
                                     <x-primary-button class=""><a href="{{ route('authors.edit', $author) }}">Edit</a></x-primary-button>
                                    <form method="POST" action="{{ route('authors.destroy', $author) }}">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button onclick="event.preventDefault(); this.closest('form').submit();">
                                                Delete
                                            </x-primary-button>
                                        </form>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    
                <div class="mt-6">
                    {{$authors}}
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>