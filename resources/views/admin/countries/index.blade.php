<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Countries') }}
        </h2>
    </x-slot>
    
    <div class="py-10">       
        @if (session('message'))
            <div class="bg-blue-200 w-auto text-gray-900 m-2 p-2 rounded-md font-medium text-center">
                {{session('message')}}
            </div>
        @endif
        <div class="flex justify-end mb-3">
            <a href="{{ route('countries.create')}}" class="py-2 px-4 shadow font-medium bg-green-300 hover:bg-green-400 sm:rounded-md">New Country</a>
        </div>
        <div class="relative overflow-x-auto mx-auto shadow sm:rounded-md">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Country Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $country)      
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 text-base font-semibold text-black ">
                                {{ $country->name }}
                            </td>
                            <td class="px-6 py-4">                                
                                {{ $country->country_code }}                                
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('countries.edit', $country->id)}}" type="button" class="font-medium text-blue-600 hover:underline">Edit</a>    
                                <form
                                    class="font-medium text-red-600 hover:underline"
                                    method="POST"
                                    action="{{ route('countries.destroy', $country->id) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $countries->links() }}
        </div>          
    </div>
</x-app-layout>