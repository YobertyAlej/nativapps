<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $top_courses_ids = DB::table('classroom_student')
            ->select(DB::raw('count(*) as students_count, classroom_student.classroom_id'))
            ->whereDate('updated_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('classroom_student.classroom_id')
            ->orderBy('students_count', 'DESC')
            ->limit(3)
            ->get()
            ->pluck('classroom_id');

        $top_courses = Classroom::whereIn('id', $top_courses_ids)->get();

        return Inertia::render('Dashboard', [
            'top_courses' => $top_courses
        ]);
    }
}
