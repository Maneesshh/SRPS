@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">Edit Marks</h2>
            </div>
            @if (session('message'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show">
                <div class="alert alert-success">{{ session('message') }}</div>
            </div>
    </div>
    @endif
            <div class="card" id="test">
                <p>
                <form method="post" action="{{ 'updatemarks' }}">
                    @csrf 
                    @method('put')
                    <input type="hidden" name="class" id="class" value="{{ $class }}">
                    <input type="hidden" name="subject" id="subject" value="{{ $subject }}">
                    <input type="hidden" name="exam" id="exam" value="{{ $exam }}">
                    <table style="width: 100%">
                        <thead>
                            <tr>
                                <th rowspan="2">S/N</th>
                                <th rowspan="2">Name</th>
                                <th colspan="2">
                                    {{ \Illuminate\Support\Facades\DB::table('subjects')->where('id', $subject)->value('subname') }}
                                </th>
                            </tr>
                            <tr>
                                <th>Theory(60)</th>
                                <th>Practical(40)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;?> 
                            @foreach ($marks as $mk)
                            <tr>
                                @if(($mk->subject_id==$subject && $mk->class_id==$class ))
                                    <td>{{ $i++ }}</td>
                                    <td> <input type="hidden" name="mid" id="mid" value="{{ $mk->id}}">
                                        <input type="hidden" name="sid" id="sid" value="{{ $mk->student_id}}">
                                        {{ \Illuminate\Support\Facades\DB::table('users')->where('id', $mk->student_id)->value('name') }}
                                    </td>
                                    <td><input  min="1" max="60" class="text-center"name="theory" value="{{ $mk->theory }}" type="number"></td>
                                    <td><input  min="1" max="40" class="text-center" name="prac" value="{{ $mk->prac }}" type="number"></td>              
                                 @endif
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <div class="text-center mt-2">
                    <button type="submit" class="btn btn-primary">Update Marks <i
                            class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
            </p>
        </div>
    </div>
@endsection