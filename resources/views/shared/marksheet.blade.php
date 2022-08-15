@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">Select Details</h2>

            </div>
            @if (session('message'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show">
                    <div class="alert alert-success">{{ session('message') }}</div>
                </div>
        </div>
        @endif
        <div class="card">
            <p>
            <form id="frm1" method="POST" action="{{ 'viewmsheet' }}">
                @csrf
                <x-label for="class"></x-label>Select Class:
                <select name="class" id="class"
                    class="inline-block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach ($class as $clas)
                        <option value="{{ $clas->classname }}">{{ $clas->classname }}</option>
                    @endforeach
                </select>
                </select> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <x-label for="exam" class="inline-block"></x-label>Select Exam:
                <select name="exam" id="exam"
                    class="inline-block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm ">
                    @foreach ($examlist as $exam)
                        <option value="{{ $exam->name }}">{{ $exam->name }}</option>
                    @endforeach
                </select>
                &nbsp &nbsp &nbsp &nbsp
                <x-label for="student" class="inline-block"></x-label>Select Student:
                <select name="student" id="student"
                    class="inline-block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm ">
                    @if (Auth::user()->hasRole('admin|teachers'))
                    @foreach ($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                    @endif
                    @if (Auth::user()->hasRole('students'))
                    <option value="{{ Auth::user()->name }}">{{ Auth::user()->name }}</option>
                   @endif
                </select>
                &nbsp &nbsp &nbsp &nbsp
                <button type="submit" class="btn btn-primary" id="idbutton">Submit</button>
            </form>
            </p>
        </div> <br>
        
    </div>
@endsection
