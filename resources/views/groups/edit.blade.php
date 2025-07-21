<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Split your Expenses
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('status'))
        <p class="bg-green-400 text-white font-bold p-5 w-[89%] m-auto mb-4">The group name has changerd successfully</p>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  p-10">
                <h2 class="text-center text-xl">Edit Group</h2>
                <form action="/groups/{{$group->id}}" method="post" class="w-1/2 m-auto">
                    @csrf
                    @method('put')
                    <div class="mb-4">
                        <label for="name" class="w-full mb-1 block">Group Name</label>
                        <input type="text" class="w-full border rounded p-2 mb-1" id="name" name="group-name" value="{{$group->name}}">
                        @error('group-name')
                        <p class="text-xs">{{$message}}</p>
                        @enderror
                        <div class="mt-4 flex justify-between">
                            <button class="bg-blue-500 px-3 py-2 text-white rounded font-bold">Update</button>
                            <button form="delete-form" class="bg-red-500 px-3 py-2 text-white rounded font-bold">Delete</button>
                        </div>
                    </div>
                </form>
                <form action="/groups/{{$group->id}}" id="delete-form" method="post">
                    @csrf
                    @method('delete')
                </form>
                <div class="flex justify-center flex-col gap-5 p-3 capitalize">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>