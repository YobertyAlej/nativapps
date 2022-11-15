<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classroom\UpdateRequest;
use App\Http\Requests\Classroom\StoreRequest;
use App\Models\Classroom;
use Inertia\Inertia;

class ClassroomController extends Controller
{
    public function index()
    {
        return Inertia::render('Classroom/Index', [
            'classrooms' => Classroom::all()
        ]);
    }

    public function show(Classroom $classroom)
    {
        return Inertia::render('Classroom/Show', [
            'classroom' => $classroom
        ]);
    }

    public function create()
    {
        return Inertia::render('Classroom/Create', []);
    }

    public function store(StoreRequest $request)
    {
        $payload = [
            'name' => $request->name,
            'schedule' => $request->schedule,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];

        Classroom::create($payload);

        return redirect()
            ->route('classrooms.index')
            ->with('message', 'Classroom Created Succesfully');
    }

    public function edit(Classroom $classroom)
    {
        return Inertia::render(
            'Classroom/Edit',
            [
                'classroom' => $classroom
            ]
        );
    }

    public function update(UpdateRequest $request, Classroom $classroom)
    {
        $payload = $request->all();
        $classroom->update($payload);

        return redirect()
            ->route('classrooms.index')
            ->with('message', 'Classroom Updated Successfully');
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return redirect()
            ->route('classrooms.index')
            ->with('message', 'Classroom Delete Successfully');
    }
}
