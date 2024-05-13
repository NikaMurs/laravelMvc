<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'start_from' => 'required|date',
            'is_active' => 'required|boolean'
        ]);

        \Log::info('Validated Data:', $validatedData);

        Group::create($validatedData);
        return redirect()->route('groups.index');
    }

    public function show(Group $group)
    {
        return view('groups.show', compact('group'));
    }

    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'start_from' => 'required|date',
            'is_active' => 'boolean'
        ]);

        $group->update($validatedData);
        return redirect()->route('groups.index');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index');
    }
}
