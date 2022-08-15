<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Exam;
use App\Models\ExamRecords;
use App\Models\Marks;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
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
       $exam_records=new ExamRecords();
       $e=$exam->id;
       $student_records=DB::table('student_records')->get();
       $te=DB::table('subject-class-teacher')->get();
        foreach($student_records as $s){
            // $exam_records->exam_id=$e;
            // $exam_records->student_id =$s->user_id;
            // $exam_records->class_id =$s->class_id;
            // $exam_records->save();
            DB::table('exam_records')->insert(['exam_id'=>$e,'student_id'=>$s->user_id,'class_id'=>$s->class_id]);
           foreach($te as $t){
            if($s->class_id==$t->class_id){
            DB::table('marks')->insert(['exam_id'=>$e,'student_id'=>$s->user_id,'subject_id'=>$t->subject_id,'class_id'=>$s->class_id]);
            }
        }
        }      
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
        // $marks=Marks::all();
        $marks=DB::select("SELECT * FROM `marks` WHERE `class_id`=$class && `exam_id`=$exam && `subject_id`=$subject");
        // $marks=DB::select("SELECT  marks.id,`student_id`,`class_id`,`subject_id`,`exam_id`,`prac`,`theory`,`total` FROM `marks` INNER JOIN subjects ON marks.subject_id=subjects.id WHERE marks.student_id IN(SELECT `student_id` FROM `marks` GROUP BY student_id) && marks.exam_id=$exam && marks.class_id=$class");
        // $test=DB::select("SELECT * FROM `marks` GROUP BY marks.subject_id");
        // $test2=DB::select("SELECT * FROM `marks` ORDER BY marks.student_id");
        $test3=DB::select("SELECT `id`,`user_id` FROM `student_records` WHERE `class_id`=$class");
        $test=DB::select("SELECT COUNT(*) FROM `student_records` WHERE `class_id`=$class");
        return view('shared.editmarks',compact('class','subject','exam','marks','test3','test'));
        // return view('shared.editmarks',compact('class','exam','marks','test','test2','test3'));

    }
    public function updatemarks(Request $request)
    {
        // dd($request->all());
        // $mid=$request->input('mid');
        // $marks=Marks::find($mid);
        // $marks->prac=$request->input('prac');
        // $marks->theory=$request->input('theory');
        // $marks->total= $request->input(['prac'] )+ $request->input(['theory']);
        // $marks->save(); 
        $mid=$request->input('mid');
        $prac=$request->input('prac');
        $theory=$request->input('theory');
        foreach($mid as $m=>$id){
            $values=array(
               'prac'=>$prac[$m],
               'theory'=>$theory[$m],
               'total'=>$prac[$m]+$theory[$m],
            );
            DB::table('marks')->where('id','=',$id)->update($values);
        }

        return redirect(route('marks'))->with('message','Marks Inserted ');
        
    }
    public function marksheet()
    {
        $class=Classes::all();
        $examlist=Exam::all();
        $users = User::whereRoleIs(['students'])->get();
        return view('shared.marksheet',compact('class','examlist','users'));
    }
    public function tsheet()
    {
        $class=Classes::all();
        $examlist=Exam::all();
        return view('shared.tsheet',compact('class','examlist'));
    }
    public function viewtsheet(Request $r)
    {
        $class=$r->class;
        $exam=$r->exam;
        $marks=DB::select("SELECT  marks.id,`student_id`,`class_id`,`subject_id`,`exam_id`,`prac`,`theory`,`total` FROM `marks` INNER JOIN subjects ON marks.subject_id=subjects.id WHERE marks.student_id IN(SELECT `student_id` FROM `marks` GROUP BY student_id) && marks.exam_id=$exam && marks.class_id=$class");
        $test=DB::select("SELECT * FROM `marks` GROUP BY marks.subject_id");
        $test2=DB::select("SELECT * FROM `marks` ORDER BY marks.student_id");
        $test3=DB::select("SELECT student_id FROM `marks` GROUP BY student_id");
        return view('shared.viewtsheet',compact('class','exam','marks','test','test2','test3'));
    }
    public function viewmsheet(Request $r)
    {
        $class=$r->class;
        $exam=$r->exam;
        $student=$r->student;
        return view('shared.viewmsheet',compact('class','exam','student'));
    }
    //exam ends
}
