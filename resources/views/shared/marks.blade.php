@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">Marks</h2>

            </div>
            @if (session('message'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show">
                    <div class="alert alert-success">{{ session('message') }}</div>
                </div>
        </div>
        @endif
        <div class="card">
            <p>
            <form id="frm1" method="GET" action="{{ 'editmarks' }}">
                @csrf
                <x-label for="class"></x-label>Select Class:
                <select name="class" id="class"
                    class="inline-block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach ($class as $clas)
                        <option value="{{ $clas->id }}">{{ $clas->classname }}</option>
                    @endforeach
                </select>
                </select> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <x-label for="section" class="inline-block"></x-label>Select Subject:
                <select name="subject" id="subject"
                    class="inline-block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm ">
                    @foreach ($classlist as $sub)
                        <option value="{{ $sub->id }}">{{ \Illuminate\Support\Facades\DB::table('subjects')->where('id',$sub->id)->value('subname')}}</option>
                    @endforeach
                </select> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <x-label for="exam" class="inline-block"></x-label>Select Exam:
                <select name="exam" id="exam"
                    class="inline-block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm ">
                    @foreach ($examlist as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                    @endforeach
                </select>
                &nbsp &nbsp &nbsp &nbsp
                <button type="submit" class="btn btn-primary" id="idbutton">Submit</button>
            </form>
            </p>
        </div> <br>
        
    </div>
@endsection
