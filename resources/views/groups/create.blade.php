<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Split your Expenses
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-80 p-10">
                <h2 class="text-center">Create Group</h2>
                <form action="/groups/store" class="w-1/4 m-auto" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="w-full mb-1 block">Group Name</label>
                        <input type="text" class="w-full border rounded p-2 mb-1" id="name" name="group-name">
                        @error('group-name')
                        <p class="text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <button class="m-auto bg-gray-600 text-white w-full rounded p-2">Create</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>