<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades=Grade::all();
      return view('shared.grades',compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $grades=new Grade();
       $grades->name=$request->input('gname');
       $grades->gpoint=$request->input('gpoint');
       $grades->marks_from=$request->input('marksf');
       $grades->marks_to=$request->input('markst');
       $grades->remarks=$request->input('remarks');
       $grades->save();
       return redirect()->back()->with('message','Grade Added Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grades=Grade::find($id);
        return response()->json([
            'grades'=>$grades,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'gname' => ['required', 'string', 'max:255'],
            'gpoint' =>'required','numeric|min:1|max:4',
            'marksf' =>'required','digits_between:10,90',
            'remark'=>['required', 'string', 'max:50'],
            'markst' => 'required','digits_between:10,100',
        ]);
        $gid=$request->input('gid');
        $grades=Grade::find($gid);
        $grades->name=$request->input('gname');
        $grades->gpoint=$request->input('gpoint');
        $grades->marks_from=$request->input('marksf');
        $grades->marks_to=$request->input('markst'); 
        $grades->remarks=$request->input('remark');
        $grades->update();
        return redirect()->back()->with('message','Grade Updated Successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grades=Grade::find($id);
        $grades->delete();
        return redirect()->back()->with('message','Grade Deleted Successfully');
    }
}
