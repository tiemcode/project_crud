<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h1 class="font-semibold text-xl text-gray-200 leading-tight">
                {{ __('projecten') }}
            </h1>

            <div class="flex flex-row-reverse">
                <a href="{{ route('projects.add') }}">
                    <button type="button" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        project toevoegen
                    </button>
                </a>
            </div>
        </div>
    </x-slot>

    <div class="w-1/2">
        <div class="my-2 ">
            <form action="{{route('search.post')}}" class="flex flex-row flex-between ">
                <input type="text" name="search" id="search" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="zoeken">
                <input type="submit" value="ga zoeken" class="rounded-md ml-4 bg-indigo-600 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            </form>
        </div>

        <table class="w-full rounded  dark:bg-gray-800">
            <tbody class="text-white shadow-lg shadow-black ">
                <tr class="border-b border-gray-500">
                    <td class="p-2">
                        titel &nbsp
                    </td>
                    <td class="p-2">
                        <div class="flex justify-center">
                            <p>
                                aangemaakte datum
                            </p>

                        </div>
                    </td>
                    <td class="flex justify-center p-2">
                        acties
                    </td>
                </tr>
                @foreach ($projects as $post)
                <tr class="border-b border-gray-700">
                    <td class="w-[40%] p-2">
                        <h6>
                            {{ Str::ucfirst($post->name) }}
                        </h6>
                    </td>

                    <td class="w-[20%] p-2 text-white">
                        <div class="flex justify-center">
                            {{ date('d/m/Y', strtotime($post->date_started)) }}
                        </div>
                    </td>
                    <td class="w-[20%] p-2">
                        <div class="flex justify-evenly">
                            <a class="text-white no-underline" href='{{ route('projects.edit', ['id' => $post->id]) }}'>edit</a>
                            <form id="formDelete" method="POST" action="{{ route('projects.delete', ['id' => $post->id]) }}" onsubmit="return confirm('Weet je zeker dat je deze wilt verwijderen?');">
                                @csrf
                                <input type="submit" value="{{ __('delete') }}" class="text-red-500 hover:cursor-pointer" :href="route('deletePost')" onclick="event.preventDefault(); this.closest('form').submit();">
                            </form>


                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex pt-2 flex-row-reverse">
            {!! $projects->links() !!}
        </div>
    </div>
</x-app-layout>
