<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;

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
        return view('shared.marks');
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
