<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('project toevoegen') }}
        </h1>
    </x-slot>

    <div class=" w-1/2 dark:bg-gray-800">
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-4" action="{{ route('project.user.added', ['id' =>$id]) }}" method="POST">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-white">gebruikers naam</label>
                    <div class="mt-2">
                        <select class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" name="rollen" id="rollen">
                            @foreach ($user as $item)
                            <option class="text-black" value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between">
                        <label for="rollen" class="block text-sm font-medium leading-6 text-white">rol</label>
                    </div>
                    <div class="mt-2">
                        <select class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6" name="rollen" id="rollen">
                            @foreach ($role as $item)
                            <option class="text-black" value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-2 flex flex-row-reverse">
                    <input type="submit" class=" ml-3 mb-5 inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500" value="voeg toe">
                    <a href="{{ route('projects.user', ['id' => $id]) }}">
                        <div class=" mb-5 inline-flex items-center  px-3 py-2 text-sm font-medium text-indigo-400 underline shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                            ga terug</div>
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
