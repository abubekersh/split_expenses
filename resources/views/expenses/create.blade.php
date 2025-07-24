<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Split your Expenses
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <a href="/groups/{{$group->id}}" class="px-3 py-2 rounded bg-gray-400 font-bold text-white text-sm mb-2 inline-block">Back </a>
                <h2 class="text-center">Create Expenses <br>&ast;<span class="text-xs">(The payer is always assumed to be the creator of this expense)</span></h2>
                <form action="/expenses/{{$group->id}}/store" class="w-[50%] m-auto" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="w-full mb-1 block">Title</label>
                        <input type="text" class="w-full border rounded p-2 mb-1" id="title" name="title">
                        @error('title')
                        <p class="text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="amount" class="w-full mb-1 block">Amount</label>
                        <input type="text" class="w-full border rounded p-2 mb-1" id="amount" name="amount">
                        @error('amount')
                        <p class="text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label for="participant">Participant members(click to add the members)</label>
                        <textarea name="participant" class="border w-full mb-2" rows="5" id="participant"></textarea>
                        <div class="flex justify-between flex-wrap">
                            @foreach ($members as $member)
                            @php
                            if($member->user->name == Auth::user()->name){
                            continue;
                            }
                            @endphp
                            <div onclick="addToExpense('{{$member->user->name}}')" class="bg-gray-400 text-xs border-white border-2 text-white rounded font-bold w-1/2 p-1">{{$member->user->name}}</div>
                            @endforeach
                        </div>
                        <script>
                            function addToExpense(name) {
                                let ta = document.getElementById('participant');

                                if (ta.value == "")
                                    document.getElementById('participant').value += name;
                                else
                                    document.getElementById('participant').value += ", " + name;
                            }
                        </script>
                        @if(session('error'))
                        <p class="text-xs">{{session('error')}}</p>
                        @endif
                        @error('participant')
                        <p class="text-xs">{{$message}}</p>
                        @enderror
                    </div>
                    <button class="m-auto bg-gray-600 text-white w-full rounded p-2">Create</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>