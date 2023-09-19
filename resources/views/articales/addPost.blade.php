<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Artikel toevoegen') }}
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
                            <label for="date_posted">gepubliceerde datum</label>
                            <input name="date_publised" require id="date_publised" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" type="date" />
                            @error('date_posted')
                            <div>
                                @foreach ($errors->get('date_posted') as $message)
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
                        <div class="mt-2">
                            <label for="cate">categorieën
                            </label>
                            <select name="cate" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                @foreach ($catedata as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('cate')
                            <div>
                                @foreach ($errors->get('cate') as $message)
                                <p class="text-red-600">{{ $message }}</p>
                                @endforeach
                            </div>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label class="block text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload bestand</label>
                            <input name="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                        </div>
                        <div class="mt-2 flex flex-row-reverse">
                            <input type="submit" class=" ml-3 mb-5 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" value="voeg toe">
                            <a href="{{route('dashboard')}}">
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
            for (const name of ['description', 'intro']) {
                ClassicEditor
                    .create(document.getElementById(name))
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    </script>
    @endsection
</x-app-layout>
