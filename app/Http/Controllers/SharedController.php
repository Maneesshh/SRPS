<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Shared;
use Illuminate\Http\Request;

class SharedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function myprofile(){
        return view('shared.myprofile');
    }
    //class starts
    public function createclass(){
        return view('shared.createclass');
    }
    public function insertclass(Request $request){
        $classes=new Classes();
        $classes->classname=$request->input('classname');
        $classes->classnum=$request->input('classnum');
        $classes->section=$request->input('section');
        $classes->save();
        return redirect('/createclass')->with('message','Class Created Sucessfully!');
    }
    public function manageclass(){
        $classes=Classes::all();
        return view('shared.manageclass',compact('classes'));
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
    public function grades(){
        return view('shared.grades');
    }
    public function marks(){
        return view('shared.marks');
    }
    public function marksheet(){
        return view('shared.marksheet');
    }
    public function tsheet(){
        return view('shared.tsheet');
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
