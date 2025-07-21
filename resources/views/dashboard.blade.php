<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Split your Expenses
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-80 p-10">

                <div class="flex justify-center gap-15">
                    <div class="border-gray-500 border-2 rounded font-medium h-60 w-1/4 items-center text-center pt-28">
                        <a href="/groups/">
                            groups
                        </a>
                    </div>
                    <div class="border-gray-500 border-2 rounded font-medium h-60 w-1/4 items-center text-center pt-28">
                        <a href="/groups/create">
                            create group
                        </a>
                    </div>
                    <div class="border-gray-500 border-2 rounded font-medium h-60 w-1/4 items-center text-center pt-28">
                        <a href="/groups/join">
                            join group
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>