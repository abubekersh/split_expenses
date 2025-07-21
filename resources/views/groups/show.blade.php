<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Split your Expenses
        </h2>
    </x-slot>

    <div class="py-12">
        @if ($success??false)
        <p class="bg-green-400 text-white font-bold p-5 w-[89%] m-auto mb-4">The group <strong>{{$group->name}}</strong> has created successfully</p>
        @endif
        @if (session('status'))
        <p class="bg-green-400 text-white font-bold p-5 w-[89%] m-auto mb-4">The group name has changerd successfully</p>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  p-10">
                <h2 class="bg-gray-500 p-4 text-white text-xl text-center mb-2">{{$group->name}}</h2>
                <p class="text-right ">code: {{$group->code}}</p>
                <div class="flex justify-center flex-col gap-5 p-3 capitalize mb-6">
                    <h3 class="text-lg">Members</h3>
                    @foreach ($members as $member )
                    <p>{{$member->user->name}}
                        @if($group->created_by=== $member->user->id)
                        <span class="text-red-400 ml-5">Creator</span>
                        @endif
                    </p>
                    @endforeach
                </div>
                <a href="/groups/{{$group->id}}/edit" class="bg-blue-500 px-3 py-2 text-white rounded font-bold">Edit Group</a>
            </div>
        </div>
    </div>
</x-app-layout>