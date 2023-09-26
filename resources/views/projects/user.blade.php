<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h1 class="font-semibold text-xl text-gray-200 leading-tight">
                {{ __('projecten') }}
            </h1>
            <div class="flex flex-row-reverse">
                <a href="{{route('project.user.add' , ['id' =>$data->id])}}">
                    <button type="button" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        gebruiker toevoegen
                    </button>
                </a>
            </div>
    </x-slot>
    <div class="flex justify-center w-[50%] ">
        <div class="flex pt-3 items-center flex-col justify-center w-full dark:bg-gray-800">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projects.edit', ['id' => $data->id]) }}">aanpassen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page">gebruikers</a>
                </li>
            </ul>
            <div class="mt-2 w-3/4 mb-3">
                <table class="rounded w-full dark:bg-gray-800">
                    <tbody class="text-white shadow-lg shadow-black ">
                        <tr class="border-b border-gray-500">
                            <td class="p-2">gebruikers</td>
                            <td class="p-2">rolen</td>
                        </tr>
                        @foreach ($data->users as $user)
                        <tr class="border-b border-gray-700">
                            <td class="w-[40%] p-2">
                                @if ($user->pivot->user_id)
                                {{ $user->where('id', $user->pivot->user_id)->first()->name }}
                                @else
                                geen user gevonden
                                @endif
                            </td>
                            <td class="w-[20%] p-2 text-white">

                                @if ($user->pivot->role_id)
                                {{ $user->roles->where('id', $user->pivot->role_id)->first()->name }}
                                @else
                                Geen rol toegewezen
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-evenly">
                                    <a class="text-white no-underline" href='{{ route('projects.user.edit', ['userId' => $user->id, 'projectId'=> $data->id ]) }}'>edit</a>
                                    <form id="formDelete" method="POST" action="{{ route('projects.user.delete', ['id' => $user->id]) }}" onsubmit="return confirm('Weet je zeker dat je deze wilt verwijderen?');">
                                        @csrf
                                        <input type="submit" value="{{ __('delete') }}" class="text-red-500 hover:cursor-pointer" :href="route('deletePost')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
