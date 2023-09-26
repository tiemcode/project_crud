<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('project toevoegen') }}
        </h1>
    </x-slot>

    <div class="flex justify-center w-[50%] ">
        <div class=" flex justify-center w-full dark:bg-gray-800">
            <form enctype="multipart/form-data" class="text-white" action="{{ route('addedpost') }}" method="post">
                @csrf
                <div class="flex flex-row pt-4 text-white">
                    <div id="richt">
                        <div class="mt-2">
                            <label for="title">title</label>
                            <input type="text" name="title" id="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                            @error('title')
                            <div>
                                @foreach ($errors->get('title') as $message)
                                <p class="text-red-600">{{ $message }}</p>
                                @endforeach
                            </div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="intro">intro</label>
                            <textarea name="intro" id="intro" class="intro  block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            @error('description')
                            <div>
                                @foreach ($errors->get('intro') as $message)
                                <p class="text-red-600">{{ $message }}</p>
                                @endforeach
                            </div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="description">description</label>
                            <textarea rows="8" cols="48" name="description" id="description" class="block w-full  rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            @error('description')
                            <div>
                                @foreach ($errors->get('description') as $message)
                                <p class="text-red-600">{{ $message }}</p>
                                @endforeach
                            </div>
                            @enderror
                        </div>
                        <div class="mt-2 flex flex-row-reverse">
                            <input type="submit" class=" ml-3 mb-5 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" value="voeg toe">
                            <a href="{{route('projects.index')}}">
                                <div class=" mb-5 inline-flex items-center  px-3 py-2 text-sm font-medium text-indigo-400 underline shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">ga terug</div>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @section('scripts')
    <script>
        window.addEventListener('load', () => {
            for (const name of ['description', ]) {
                ClassicEditor
                    .create(document.getElementById(name))
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    @endsection
</x-app-layout>
