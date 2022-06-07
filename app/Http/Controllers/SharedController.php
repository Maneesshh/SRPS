<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Shared;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Auth;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Log;

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
    public function updateprofile(Request $request)
    {
        $a = $request->input('id');
        $user = User::find($a);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        if ($request->hasFile('photo')) {
            $destination = $user->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('photo');
            $name = $file->hashName();
            $url = Storage::disk('public')->putFileAs('', $file, $name);
            $user->photo = '/img/usersupload/' . $name;
        }
        $user->update();
        return redirect()->back()->with('message', 'User details updated successfully');
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
    public function delclass($id)
    {
        $classes = Classes::find($id);
        $classes->delete();
        return redirect()->back()->with('message', "Class Deleted");
    }
    public function editclass($id)
    {
        $classes = Classes::find($id);
        return response()->json([
            'classes' => $classes,
        ]);
    }
    public function updateclass(Request $request)
    {
        $cid = $request->input('classid');
        $classes = Classes::find($cid);
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
            'subject' => $subjects,
        ]);
    }
    public function updatesub(Request $request)
    {
        $subid = $request->input('subid');
        $subjects = Subject::find($subid);
        $subjects->subname = $request->input('subname');
        $subjects->subcode = $request->input('subcode');
        $subjects->sub_type = $request->input('sub-type');
        $subjects->update();
        return redirect()->back()->with('message', 'Data Updated Successfully');
    }
    public function removesub($id)
    {
        $subjects = Subject::find($id);
        $subjects->delete();
        return redirect()->back()->with('message', 'Deleted Successfully!');
    }
    public function addsubc()
    {
        $subjects = Subject::all();
        $classes = Classes::all();
        return view('shared.addsubc', compact('subjects', 'classes'));
    }
    public function managesubc()
    {
        return view('shared.managesubc');
    }
    //sub ends
    //teachers start
    public function createteacher()
    {
        return view('shared.createteacher');
    }
    public function manageteacher()
    {
        $users = User::whereRoleIs(['teachers'])->get();
        return view('shared.manageteacher',compact('users'));
    }
    public function addteacherc()
    {
        
        $subjects = Subject::all();
        $classes = Classes::all();
        // $user =User::hasRole('teachers');
        $users = User::whereRoleIs(['teachers'])->get();
        return view('shared.addteacherc',compact('subjects','classes','users'));
    }
    public function manageteacherc()
    {

        return view('shared.manageteacherc');
    }
    public function editteacher($id)
    {
        $user=User::find($id);
        return response()->json([
            'user'=>$user,
        ]);
    }
    public function updateteacher(Request $request)
    {
        $a = $request->input('tid');
        $user = User::find($a);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->gender = $request->input('gender');
        if ($request->hasFile('photo')) {
            $destination = $user->photo;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('photo');
            $name = $file->hashName();
            $url = Storage::disk('public')->putFileAs('', $file, $name);
            $user->photo = '/img/usersupload/' . $name;
        }
        $user->update();
        return redirect()->back()->with('message', 'Teachers details updated successfully');    }
    //teachers ends
    //student starts
    public function createstudent()
    {
        $classes = Classes::all();
        return view('shared.createstudent', compact('classes'));
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
    public function auser()
    {
     return view('shared.auser');
    }
    public function addusers(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'add' =>['required', 'string', 'max:255'],
            'gender'=>['required', 'string', 'max:50'],
            'phone' => 'required|digits:10',
        ]);
        if (!$request->has('photo')) {
            return response()->json(['message' => 'Missing file'], 422);
        }
        $file = $request->file('photo');
        $name= $file->hashName();
        $url = Storage::disk('public')->putFileAs('', $file, $name);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->add,
            'photo' =>  '/img/usersupload/' . $url,
            // 'photo' =>  env('APP_URL') . '/public/img/usersupload/' . $url,

        ]);  
        $user->attachRole($request->role_id);
        return redirect()->back()->with('message','User Added Successfully');
    }
    public function deleteuser($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->back()->with('message', 'Deleted Successfully!');
    }

}
