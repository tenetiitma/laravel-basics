<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Author')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                    <form method="POST" action="{{ route('authors.update', $author) }}">
                        @csrf
                        @method('patch')
                        <x-text-input name="first_name" value="{{ old('first_name', $author->first_name) }}" ></x-text-input>
                        <x-text-input name="last_name" value="{{ old('last_name', $author->last_name) }}" ></x-text-input>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                        <div class="mt-4 space-x-2">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                            <a href="{{ route('authors.index') }}">{{ __('Cancel') }}</a>
                        </div>
                    </form>
    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>