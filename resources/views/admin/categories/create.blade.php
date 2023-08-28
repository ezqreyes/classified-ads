<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Category') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="flex justify-end mb-3">
            <a href="{{ route('categories.index') }}"
                class="py-2 px-4 shadow font-medium bg-red-300 hover:bg-red-400 sm:rounded-md">Back</a>
        </div>
        <div class="container mx-auto shadow sm:rounded-md">
            <form class="p-5" enctype="multipart/form-data" action="{{ route('categories.store')}}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900"> Name:</label>
                    <input type="text" id="name" name="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5">
                </div>
                <div class="mb-6">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Image:</label>
                    <input type="file" id="image" name="image"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-black focus:border-black block w-full p-2.5">
                </div>
                <div class="flex justify-center">
                    <button type="submit"
                        class=" px-5 py-2.5 text-center font-semibold bg-green-300 hover:bg-green-400 text-sm w-full sm:w-auto sm:rounded-md ">
                        Save
                    </button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
