<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        @foreach ($orders as $order)
                        <li>
                            <div class="flex border-b justify-between items-center">
                                <p>{{$order->delivery_address}}, {{$order->status}}</p>
                                <div class="pt-3">
                                    <x-danger-button>delete</x-danger-button>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    
                <div class="mt-6">
                    {{$order}}
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>