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
              <form id="frm1" method="POST" action="{{('editmarks')}}">
                <x-label for="class"></x-label>Select Class:
                <select name="class" id="class"
                    class="inline-block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach ($classlist as $class)
                        <option value="{{ $class->classname }}">{{ $class->classname }}</option>
                    @endforeach
                </select>
                </select> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <x-label for="section" class="inline-block"></x-label>Select Section:
                <select name="section" id="section"
                    class="inline-block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm ">
                    @foreach ($classlist as $class)
                        <option value="{{ $class->section }}">{{ $class->section }}</option>
                    @endforeach
                </select> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                <x-label for="exam" class="inline-block"></x-label>Select Exam:
                <select name="exam" id="exam"
                    class="inline-block mt-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm ">
                    @foreach ($examlist as $exam)
                        <option value="{{ $exam->name }}">{{ $exam->name }}</option>
                    @endforeach
                </select>
                &nbsp &nbsp &nbsp &nbsp
                <button type="submit" class="btn btn-primary" id="idbutton">Submit</button>
              </form>
            </p>
        </div> <br>
        <div class="card" id="test" style="display: none">
            <p>
            <form method="Post" action="{{ '' }}">
              <div>
              <h1 id="tst" style="display: none"></h1>
              </div>
              @csrf @method('put')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>ADM_NO</th>
            <th>1ST CA (20)</th>
            <th>2ND CA (20)</th>
            <th>EXAM (60)</th>
        </tr>
        </thead>
        <tbody>
        {{-- @foreach($marks->sortBy('user.name') as $mk)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mk->user->name }} </td>
                <td>{{ $mk->user->student_record->adm_no }}</td> --}}

{{--                CA AND EXAMS --}}
                {{-- <td><input title="1ST CA" min="1" max="20" class="text-center" name="t1_{{ $mk->id }}" value="{{ $mk->t1 }}" type="number"></td>
                <td><input title="2ND CA" min="1" max="20" class="text-center" name="t2_{{ $mk->id }}" value="{{ $mk->t2 }}" type="number"></td>
                <td><input title="EXAM" min="1" max="60" class="text-center" name="exm_{{ $mk->id }}" value="{{ $mk->exm }}" type="number"></td>

            </tr> --}}
        {{-- @endforeach --}}
        </tbody>
    </table>

    <div class="text-center mt-2">
        <button type="submit" class="btn btn-primary">Update Marks <i class="icon-paperplane ml-2"></i></button>
    </div>
            </form>
            </p>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // document.getElementById("test").style.display = "none";
            $("#idbutton").click(function() {
                var x = document.getElementById("frm1");
                var text = "";
                var i;
                for (i = 0; i < x.length; i++) {
                    text += x.elements[i].value + "<br>";
                }
                document.getElementById("tst").innerHTML = text;

                $("#test").show();
            });
        });
    </script>
@endsection
