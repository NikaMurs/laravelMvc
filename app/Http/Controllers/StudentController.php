<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create(Group $group)
    {
        return view('students.create', compact('group'));
    }

    public function store(Request $request, Group $group)
    {
        $validatedData = $request->validate([
            'surname' => 'required|max:255',
            'name' => 'required|max:255'
        ]);

        $student = new Student($validatedData);
        $group->students()->save($student);
        return redirect()->route('groups.show', $group);
    }

    public function show(Group $group, Student $student)
    {
        return view('students.show', compact('student', 'group'));
    }

    public function edit(Group $group, Student $student)
    {
        return view('students.edit', compact('student', 'group'));
    }

    public function update(Request $request, Group $group, Student $student)
    {
        $validatedData = $request->validate([
            'surname' => 'required|max:255',
            'name' => 'required|max:255'
        ]);

        $student->update($validatedData);
        return redirect()->route('groups.show', $group);
    }

    public function destroy(Group $group, Student $student)
    {
        $student->delete();
        return redirect()->route('groups.show', $group);
    }
}