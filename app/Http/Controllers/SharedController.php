<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Shared;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPSTORM_META\type;

class SharedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function myprofile()
    {
        return view('shared.myprofile');
    }
    public function updateprofile(Request $request )
    {
       $a=$request->input('id');
       $user=User::find($a);
       $user->name=$request->input('name');
       $user->email=$request->input('email');
       $user->phone=$request->input('phone');
       $user->address=$request->input('address');
       $user->gender=$request->input('gender');
       $user->update();
       return redirect()->back()->with('message','Updated Successfully');
    }
    //class starts
    public function createclass()
    {
        return view('shared.createclass');
    }
    public function insertclass(Request $request)
    {
        $classes = new Classes();
        $classes->classname = $request->input('classname');
        $classes->classnum = $request->input('classnum');
        $classes->section = $request->input('section');
        $classes->save();
        return redirect()->back()->with('message', 'Class Created Sucessfully!');
    }
    public function manageclass()
    {
        $classes = Classes::all();
        return view('shared.manageclass', compact('classes'));
    }
    public function delclass($id){
        $classes=Classes::find($id);
        $classes->delete();
        return redirect()->back()->with('message',"Class Deleted");
    }
    public function editclass($id)
    {
      $classes=Classes::find($id);
      return response()->json([
          'classes'=>$classes,
      ]);
    }
    public function updateclass(Request $request){
       $cid=$request->input('classid');
        $classes=Classes::find($cid);
        $classes->classname = $request->input('classname');
        $classes->classnum = $request->input('classnum');
        $classes->section = $request->input('section');
        $classes->update();  
        return redirect()->back()->with('message', 'Class Updated Sucessfully!');
    }
    //class ends
    //sub starts
    public function createsub()
    {
        return view('shared.createsub');
    }
    public function insertsub(Request $request)
    {
        $subjects = new Subject();
        $subjects->subname = $request->input('subname');
        $subjects->subcode = $request->input('subcode');
        $subjects->sub_type = $request->input('sub-type');
        $subjects->save();
        return redirect('/createsub')->with('message', 'subject created successfully');
    }
    public function managesub()
    {
        $subjects = Subject::all();
        return view('shared.managesub', compact('subjects'));
    }
    public function editsub($id)
    {
        $subjects = Subject::find($id);
        return response()->json([
            'subject'=>$subjects,
        ]);
    }
    public function updatesub(Request $request){
        $subid=$request->input('subid');
        $subjects=Subject::find($subid);
        $subjects->subname = $request->input('subname');
        $subjects->subcode = $request->input('subcode');
        $subjects->sub_type = $request->input('sub-type');
        $subjects->update();
        return redirect()->back()->with('message','Data Updated Successfully');


    }
    public function removesub($id)
    {
        $subjects = Subject::find($id);
        $subjects->delete();
        return redirect('/managesub')->with('message', 'Deleted Successfully!');
    }
    public function addsubc()
    {
        $subjects=Subject::all();
        $classes=Classes::all();
        return view('shared.addsubc',compact('subjects','classes'));
    }
    public function managesubc()
    {
        return view('shared.managesubc');
    }
    //sub ends
    //exam starts
    public function createexam()
    {
        return view('shared.createexam');
    }
    public function manageexam()
    {
        return view('shared.manageexam');
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
    //teachers start
    public function createteacher()
    {
        return view('shared.createteacher');
    }
    public function manageteacher()
    {
        return view('shared.manageteacher');
    }
    public function addteacherc()
    {
        return view('shared.addteacherc');
    }
    public function manageteacherc()
    {
        return view('shared.manageteacherc');
    }
    //teachers ends
    //student starts
    public function createstudent()
    {
        $classes=Classes::all();
        return view('shared.createstudent',compact('classes'));
    }
    public function managestudent()
    {
        return view('shared.managestudent');
    }
    //exam ends
    //Parents start
    public function createparent()
    {
        return view('shared.createparent');
    }
    public function manageparent()
    {
        return view('shared.manageparent');
    }
    public function addparentc()
    {
        return view('shared.addparentc');
    }
    public function manageparentc()
    {
        return view('shared.manageparentc');
    }
    //Parents ends

}
