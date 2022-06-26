@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">View Tsheet</h2>

            </div>
            @if (session('message'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show">
                    <div class="alert alert-success">{{ session('message') }}</div>
                </div>
        </div>
        @endif
        <div class="card" id="test">
            <p>
                <input type="hidden" name="class" id="class" value="{{ $class }}">
                <input type="hidden" name="exam" id="exam" value="{{ $exam }}">
                <table style="width: 100%">
                    <thead> 
                        <tr>
                            <th rowspan="2">S/N</th>
                            <th rowspan="2">Name</th>
                            @foreach($test as $m)
                              @if($m->class_id==$class)
                            <th colspan="3">
                                <input type="hidden" name="sid" value="{{$m->subject_id}}">
                             {{ \Illuminate\Support\Facades\DB::table('subjects')->where('id', $m->subject_id)->value('subname') }}
                            </th>
                            @endif
                            @endforeach
                        </tr>
                        <tr>
                            @foreach($test as $m)
                            @if($m->class_id==$class)
                            <th>Theory(60)</th>
                            <th>Practical(40)</th>
                            <th>Total</th>
                            @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <?php $row=1;?>
                        @foreach($test3 as $t)
                        <tr>
                            <td>{{$row++;}}</td>
                            <td>{{ \Illuminate\Support\Facades\DB::table('users')->where('id', $t->student_id)->value('name') }}</td>
                            @foreach($test as $m)
                            @foreach($test2 as $mak)
                            @if($t->student_id==$mak->student_id && $m->subject_id==$mak->subject_id)
                            @if($mak->class_id==$class && $mak->exam_id==$exam)
                            <td>{{$mak->prac}}</td>
                            <td>{{$mak->theory}}</td>
                            <td>{{$mak->total}}</td>
                            @endif
                             @endif
                             @endforeach
                             @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </p>
        </div>
    </div>
@endsection