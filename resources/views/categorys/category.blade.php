<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('categorieën') }}
            </h1>
            <div class="flex flex-row-reverse">
                <a href="{{ route('category.add') }}">
                    <button type="button" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        categorieën toevoegen
                    </button>
                </a>
            </div>
        </div>
    </x-slot>

    <table class="w-[50%] rounded  dark:bg-gray-800">
        <tbody class="text-white shadow-lg shadow-black ">
            <tr class="border-b border-gray-500">
                <td class="p-2">
                    naam &nbsp
                </td>
                <td class="p-2">
                    <div class="flex justify-center">
                        <p>
                            voor het laast geedit
                        </p>

                    </div>
                </td>
                <td class="flex justify-center p-2">
                    acties
                </td>
            </tr>
            @foreach ($allcate as $cate )
            <tr class="border-b border-gray-700">
                <td class="w-[40%] p-2">
                    <h2>
                        {{ Str::ucfirst($cate->name) }}
                    </h2>
                </td>
                <td class="w-[20%] p-2 text-white">
                    <div class="flex justify-center">
                        {{ date('d/m/Y', strtotime($cate->updated_at)) }}
                    </div>
                </td>
                <td class="w-[20%] p-2">
                    <div class="flex justify-evenly">
                        <a href="{{ route('category.edit', ['id' => $cate->id]) }}">edit</a>
                        <form method="POST" action="{{ route('category.delete', ['id' => $cate->id]) }}">
                            @csrf
                            <div class="text-red-500 hover:cursor-pointer" :href="route('deletePost')" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                {{ __('delete') }}
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</x-app-layout>
