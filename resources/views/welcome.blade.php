<x-guest-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Artikelen') }}
        </h1>
    </x-slot>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <p></p>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="mt-8 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    @foreach ($allposts as $post)
                    <div class=" dark:bg-gray-800 font-semibold  p-4 rounded m-4">
                        <h2 class="text-white">
                            {{ Str::ucfirst($post->title) }}
                        </h2>
                        <h3 class="font-medium text-white">
                            {{ Str::ucfirst($post->intro) }}
                        </h3>
                        <p class="text-white">
                            {{ Str::ucfirst($post->description) }}
                        </p>
                        @if ($post->file_name)
                        <img src="{{ asset($post->file_name) }}">
                        @endif
                        <p class="text-white italic">Gepubliceerde op {{ date('d/m/Y', strtotime($post->date_posted)); }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
