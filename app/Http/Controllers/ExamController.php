<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Exam;
use App\Models\Marks;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Subjectcomb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    //exam starts
    public function createexam()
    {
        return view('shared.createexam');
    }
    public function insertexam(Request $request)
    {
       $exam=new Exam();
       $exam->name=$request->input('name');
       $exam->term=$request->input('term');
       $exam->year=$request->input('year');
       $exam->save();
       return redirect()->back()->with('message','Exam Created');
    }
    public function manageexam()
    {
        $exam=Exam::all();
        return view('shared.manageexam',compact('exam'));
    }
    public function editexam($id)
    {
       $exam=Exam::find($id);
       return response()->json([
           'exam'=>$exam,
       ]);
    }
    public function removeexam($id)
    {
       $exam=Exam::find($id);
       $exam->delete();
       return redirect()->back()->with('message','Exam Deleted Successfully');

    }
    public function updateexam(Request $request)
    {
        $id=$request->input('examid');
        $exam=Exam::find($id);
        $exam->name=$request->input('name');
        $exam->term=$request->input('term');
        $exam->year=$request->input('year');
        $exam->update();
        return redirect()->back()->with('message','Exam Updated Successfully!');

    }
    public function grades()
    {
        return view('shared.grades');
    }
    public function marks()
    {
        $classlist=Subjectcomb::all();
        $class=Classes::all();
        $examlist=Exam::all();
        return view('shared.marks',compact('classlist','class','examlist'));
    }
    public function editmarks(Request $r)
    {
        $class=$r->class;
        $subject=$r->subject;
        $exam=$r->exam;
        $marks=Marks::all();
        return view('shared.editmarks',compact('class','subject','exam','marks'));
    }
    public function updatemarks(Request $request)
    {
        $mid=$request->input('mid');
        $marks=Marks::find($mid);
        $marks->prac=$request->input('prac');
        $marks->theory=$request->input('theory');
        $marks->total= $request->input(['prac'] )+ $request->input(['theory']);
        $marks->update();
        return redirect()->back()->with('message','Marks Inserted ');

    }
    public function marksheet()
    {
        return view('shared.marksheet');
    }
    public function tsheet()
    {
        return view('shared.tsheet');
    }
    //exam ends
}
