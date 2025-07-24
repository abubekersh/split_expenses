<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function create(string $id)
    {
        $group = Group::where('id', $id)->first();

        return view("expenses.create", ['group' => $group, 'members' => $group->members]);
    }
    public function store(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|unique:expenses,title',
            'amount' => 'decimal:0',
            'participant' => 'required'
        ]);
        $par = array_unique(explode(', ', $validated['participant']));
        // dd($par);
        foreach ($par as $key => $mem) {
            $par[$key] = trim($mem);
            // dd(User::where("name", 'LiKE', $par[$key])->get());
            $user = User::where('name', $par[$key])
                ->first();
            // ->where('id', '!=', Auth::id())
            if (!$user) {
                return back()->with('error', 'you added a none existent user');
            }
            if (!$user->memberOf($id)) {
                return back()->with('error', 'you added a none existent userd');
            }
            $par[$key] = $user->id;
        }
        $par[] = Auth::id();
        $expense = Expense::create([
            'title' => $validated['title'],
            'group_id' => $id,
            'amount' => $validated['amount'],
            'payed_by' => Auth::id(),
        ]);
        foreach ($par as $member) {
            $expense->participant()->create([
                'user_id' => trim($member)
            ]);
        }
        return redirect("/groups/$id")->with('status', 'expense created successfully');
    }
}
