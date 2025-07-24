<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GroupMemberController extends Controller
{
    public function create()
    {
        return view('groups.join');
    }
    public function store(Request $request)
    {
        $val = Validator::make($request->all(), [
            'group-code' => 'required|exists:groups,code'
        ]);
        if ($val->fails()) {
            return back()->withErrors($val)->withInput();
        }
        $group = Group::where('code', $request['group-code'])->first();

        if ($group->members()->where('user_id', Auth::id())->first()) {
            $val->errors()->add('group-code', 'you are already in the group');
            return back()->withErrors($val)->withInput();
        }
        $group->members()->create(['user_id' => Auth::id()]);
        $expenses = Expense::where('group_id', $group->id)->get();
        return view('groups.show', ['group' => $group, 'members' => $group->members, 'expenses' => $expenses])->with('status', 'you have joined the group successfully');
    }
}
