<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Models\Classroom;
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
            'student' => $student->load('classrooms')
        ]);
    }

    public function create()
    {
        return Inertia::render('Student/Create', [
            'classrooms' => Classroom::all()
        ]);
    }

    public function store(StoreRequest $request)
    {
        $payload = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
        ];

        $student = Student::create($payload);
        $student->classrooms()->sync($request->classrooms);

        return redirect()
            ->route('students.index')
            ->with('message', 'Student Created Succesfully');
    }

    public function edit(Student $student)
    {
        return Inertia::render(
            'Student/Edit',
            [
                'student' => $student->load('classrooms'),
                'classrooms' => Classroom::all()
            ]
        );
    }

    public function update(UpdateRequest $request, Student $student)
    {
        $payload = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
        ];

        $student->update($payload);
        $student->classrooms()->sync($request->classrooms);

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
