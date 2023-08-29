<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit State') }}
        </h2>
        <h3 class="font-medium text-l mt-1 text-gray-800 leading-tight">
            {{ $state->name }}
        </h3>
    </x-slot>

    <div class="py-10">
        <div class="flex justify-end mb-3">
            <a href="{{ route('states.index') }}"
                class="py-2 px-4 shadow font-medium bg-red-300 hover:bg-red-400 sm:rounded-md">Back</a>
        </div>
        <div class="container mx-auto shadow sm:rounded-md">
            <form class="p-5" action="{{ route('states.update', $state->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900"> Name:</label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                        value="{{ $state->name }}">
                </div>
                <div class="mb-6">
                    <label for="country_id" class="block mb-2 text-sm font-medium text-gray-900"> Country:</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5"
                        name="country_id">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" 
                                {{$country->id == $state->country_id ? 'selected' : ''}}>
                                {{ $country->name }}
                        @endforeach
                    </select>
                </div> 
                <div class="flex justify-center">
                    <button type="submit"
                        class=" px-5 py-2.5 text-center font-semibold bg-green-300 hover:bg-green-400 text-sm w-full sm:w-auto sm:rounded-md ">
                        Update
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
