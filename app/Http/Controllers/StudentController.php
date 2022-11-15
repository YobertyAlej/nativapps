<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Student;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function index()
    {
        return Inertia::render('Student/Index', [
            'students' => Student::all()
        ]);
    }

    public function show(Student $student)
    {
        return Inertia::render('Student/Show', [
            'student' => $student
        ]);
    }

    public function create()
    {
        return Inertia::render('Student/Create', []);
    }

    public function store(StoreRequest $request)
    {
        $payload = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
        ];

        Student::create($payload);

        return redirect()
            ->route('students.index')
            ->with('message', 'Student Created Succesfully');
    }

    public function edit(Student $student)
    {
        return Inertia::render(
            'Student/Edit',
            [
                'student' => $student
            ]
        );
    }

    public function update(UpdateRequest $request, Student $student)
    {
        $payload = $request->all();
        $student->update($payload);

        return redirect()
            ->route('students.index')
            ->with('message', 'Student Updated Successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('message', 'Student Delete Successfully');
    }
}
