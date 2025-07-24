<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index()
    {
        return view('groups.index', ['groups' => GroupMember::where('user_id', Auth::id())->paginate(5)]);
    }
    public function create()
    {
        return view('groups.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'group-name' => 'required|unique:groups,name'
        ]);
        $code = rand(10000, 99999);
        $group = Group::create([
            'name' => $request['group-name'],
            'code' => $code,
            'created_by' => Auth::id()
        ]);
        $group->members()->create([
            'user_id' => Auth::id()
        ]);
        return redirect("/groups")->with('status', "the group $group->name has been created successfully");
    }
    public function show(string $id)
    {
        $group = Group::where('id', $id)->first();
        if (!$group || !$this->isMember($id, Auth::id())) {
            return abort(404);
        }
        $members = $group->members;

        $expenses = Expense::where('group_id', $id)->get();
        return view('groups.show', ['group' => $group, 'members' => $members, 'expenses' => $expenses]);
    }
    private function isMember(string $group, string $user)
    {
        $result = GroupMember::where('group_id', $group)
            ->where('user_id', $user)->first();
        return $result;
    }
    public function edit(string $id)
    {
        return view('groups.edit', ['group' => Group::where('id', $id)->first()]);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'group-name' => "required|unique:groups,name,except,$id"
        ]);
        $group = Group::where('id', $id)->first();
        if (!$group || !$this->isMember($id, Auth::id())) {
            abort(404);
        }
        $group->name = $request['group-name'];
        $group->save();
        return redirect("/groups/$group->id")->with('status', 'group name changed');
    }
    public function destroy(string $id)
    {
        $group = Group::where('id', $id)
            ->where('created_by', Auth::id())
            ->first();
        if (!$group) {
            abort(404);
        }
        $group->delete();
        $group->members()->delete();
        return redirect('/groups')->with('status', 'group deleted successfully');
    }
}
