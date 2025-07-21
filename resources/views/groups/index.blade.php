<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Split your Expenses
        </h2>
    </x-slot>

    <div class="py-12">
        @if (session('status'))
        <p class="bg-green-400 text-white font-bold p-5 w-[89%] m-auto mb-4">{{session('status')}}</p>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg  p-10">
                <h2>Groups</h2>
                <div class="flex justify-center flex-col gap-5 p-3">
                    @foreach ($groups as $group )
                    <div class="border p-4 w-1/4 flex justify-between"><span>{{$group->group->name}}</span> <a href="/groups/{{$group->group->id}}" class="hover:text-blue-400 hover:underline">View</a></div>
                    @endforeach
                    {{$groups->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>