<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {
        $students = User::whereRoleIs(['students'])->count();
        $teachers = User::whereRoleIs(['teachers'])->count();
        $parents = User::whereRoleIs(['parents'])->count();
        $admin = User::whereRoleIs(['admin'])->count();
        $class = Classes::all()->count();
        $exam=Exam::all()->count();
        // $a=Auth::user()->role='admin';
        if (Auth::user()->hasRole('admin')) {
            return view('admin.index',compact('students','teachers','admin','parents','class','exam'));
        } elseif (Auth::user()->hasRole('teachers')) {
            return view('teacher.index',compact('students','teachers','parents','class','exam'));
        } elseif (Auth::user()->hasRole('students')) {
            return view('shared.myprofile');
        } elseif (Auth::user()->hasRole('parents')) {
            return view('shared.myprofile');
        } elseif (Auth::user()->hasRole('guest')) {
            return view('shared.index');
        }
    }
    
}
