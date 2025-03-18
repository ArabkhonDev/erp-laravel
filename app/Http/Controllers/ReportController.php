<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Payment;
use App\Models\Report;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        return view('reports.index');
    }

    public function studentsReport()
    {
        $students = User::where('role', 'student')->count();
        $activeStudents = User::where('role', 'student')->where('status', 'active')->count();
        $inactiveStudents = User::where('role', 'student')->where('status', 'inactive')->count();

        return response()->json([
            'total' => $students,
            'active' => $activeStudents,
            'inactive' => $inactiveStudents
        ]);
    }

    public function coursesReport()
    {
        $courses = Course::count();
        $activeCourses = Course::where('status', 'active')->count();
        $inactiveCourses = Course::where('status', 'inactive')->count();

        return response()->json([
            'total' => $courses,
            'active' => $activeCourses,
            'inactive' => $inactiveCourses
        ]);
    }

    public function paymentsReport()
    {
        $totalPayments = Payment::sum('amount');
        $monthlyPayments = Payment::whereMonth('created_at', Carbon::now()->month)->sum('amount');

        return response()->json([
            'total' => $totalPayments,
            'monthly' => $monthlyPayments
        ]);
    }
}
