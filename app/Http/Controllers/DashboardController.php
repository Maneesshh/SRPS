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
    public function myprofile(){
        return view('shared.myprofile');
    }
    //class starts
    public function createclass(){
        return view('shared.createclass');
    }
    public function manageclass(){
        return view('shared.manageclass');
    }
    //class ends
  //sub starts
    public function createsub(){
        return view('shared.createsub');
    }
    public function managesub(){
        return view('shared.managesub');
    }
    public function addsubc(){
        return view('shared.addsubc');
    }
    public function managesubc(){
        return view('shared.managesubc');
    }
    //sub ends
    //exam starts
    public function createexam(){
        return view('shared.createexam');
    }
    public function manageexam(){
        return view('shared.manageexam');
    }
    //exam ends
    //teachers start
    public function createteacher(){
        return view('shared.createteacher');
    }
    public function manageteacher(){
        return view('shared.manageteacher');
    }
    public function addteacherc(){
        return view('shared.addteacherc');
    }
    public function manageteacherc(){
        return view('shared.manageteacherc');
    }
    //teachers ends
     //student starts
     public function createstudent(){
        return view('shared.createstudent');
    }
    public function managestudent(){
        return view('shared.managestudent');
    }
    //exam ends
      //Parents start
      public function createparent(){
        return view('shared.createparent');
    }
    public function manageparent(){
        return view('shared.manageparent');
    }
    public function addparentc(){
        return view('shared.addparentc');
    }
    public function manageparentc(){
        return view('shared.manageparentc');
    }
    //Parents ends
}
