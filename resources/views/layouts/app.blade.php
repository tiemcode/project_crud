<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <!-- Fonts -->
    <script defer src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')
        <x-slot name="header">
            <div class="flex justify-between">
                <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Dashboard') }}
                </h1>
                @if(route('dashboard'))
                <div class="flex flex-row-reverse">
                    <a href="{{ route('addpost') }}">

                        <button type="button" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            artikel tovoegen
                        </button>
                    </a>
                </div>
                @endif
            </div>
        </x-slot>

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif
        <div class="flex justify-center">
            @if (session()->has('success'))
            <div class="pt-6 ">
                <div class="rounded-md w-full bg-green-200  p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800"> {{ session()->get('success') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- Page Content -->
        <main>
            <div class="pt-6 flex flex-row justify-evenly">
                <ul class=" dark:bg-gray-800 h-full">
                    <li>
                        <a href="{{route('dashboard')}}" class="block p-4 text-white hover:bg-gray-700">
                            Artikelen
                        </a>
                    </li>
                    <li>
                        <a href="{{route('category.index')}}" class="block p-4 text-white hover:bg-gray-700">categorieën </a>
                    </li>
                    <li>
                        <a href="{{route('projects.index')}}" class="block p-4 text-white hover:bg-gray-700">projecten</a>
                    </li>
                    <!-- Add more navigation links as needed -->
                </ul>
                </nav>
                {{$slot}}
            </div>
        </main>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    @yield('scripts')
    <STYLe>
        .ck {
            color: black;
        }
    </STYLe>
</body>

</html>
