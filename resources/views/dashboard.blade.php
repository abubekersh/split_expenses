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

                <div class="flex flex-col md:flex-row justify-center h-full gap-15">
                    <div class="border-gray-500 border-2 rounded font-medium  text-center p-20">
                        <a href="/groups/">
                            groups
                        </a>
                    </div>
                    <div class="border-gray-500 border-2 rounded font-medium text-center p-20">
                        <a href="/groups/create">
                            create group
                        </a>
                    </div>
                    <div class="border-gray-500 border-2 rounded font-medium  text-center p-20">
                        <a href="/groups/join">
                            join group
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>