<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {
        // $a=Auth::user()->role='admin';
        if (Auth::user()->hasRole('admin')) {
            return view('admin.index');
        } elseif (Auth::user()->hasRole('teachers')) {
            return view('teacher.index');
        } elseif (Auth::user()->hasRole('students')) {
            return view('student.index');
        } elseif (Auth::user()->hasRole('parents')) {
            return view('parents.index');
        } elseif (Auth::user()->hasRole('guest')) {
            return view('shared.index');
        }
    }
    
}
