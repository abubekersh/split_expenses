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
                <a href="/groups" class="px-3 py-2 rounded bg-gray-400 font-bold text-white text-sm mb-2 inline-block">Back </a>
                <h2 class="bg-gray-500 p-4 text-white text-xl text-center mb-2">{{$group->name}}</h2>
                <p class="text-right ">code: {{$group->code}}</p>
                <div class="flex justify-center flex-col gap-5 p-3 capitalize mb-6">
                    <h3 class="text-lg">Members</h3>
                    @foreach ($members as $member )
                    <p class="{{$member->user->id ===Auth::id()? 'text-green-400':''}}"> &rightarrow; {{$member->user->name}}
                        @if($group->created_by=== $member->user->id)
                        <span class="text-red-400 ml-5">Creator</span>
                        @endif
                    </p>
                    @endforeach
                </div>
                <a href="/groups/{{$group->id}}/edit" class="bg-blue-500 px-3 py-2 text-white rounded font-bold">Edit Group</a>
                <div class="mb-5 text-center">
                    <h2 class="mb-5 text-lg">Expenses for the {{$group->name}}</h2>
                    @if (!$expenses)
                    <p>No expenses yet</p>
                    @endif
                    <table class="mb-20">
                        <thead>
                            <tr>
                                <th>Expense name</th>
                                <th>Amount</th>
                                <th>Participants</th>
                                <th>Payed By(Owed To)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenses as $expense)
                            <tr>
                                <td>{{$expense->title}}</td>
                                <td>{{$expense->amount}}</td>
                                <td>
                                    @foreach ($expense->participant as $par )
                                    <span>{{$par->user->name ?? 'a'}} </span>
                                    <br>
                                    @endforeach
                                </td>
                                <td>{{$expense->user->name ?? ''}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="/expenses/{{$group->id}}/create" class="bg-green-500 px-3 py-2 text-white rounded font-bold">Add new Expense</a>
            </div>
        </div>
    </div>
</x-app-layout>