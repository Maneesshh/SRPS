@extends('layouts.app')
@section('content')
    <div class="content" id="mydiv">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title"> {{ \Illuminate\Support\Facades\DB::table('exams')->where('id', $exam)->value('name') }}
                    Term
                    Tsheet of Class
                    {{ \Illuminate\Support\Facades\DB::table('classes')->where('id', $class)->value('classname') }}</h2>

            </div>
            {{-- <button  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
              </svg>Print </button> --}}
            <div><button type="button" class="btn btn-outline-info" style="position: absolute; top:60px; right:50px;"
                    onclick="window.print()"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                        fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"></path>
                        <path
                            d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z">
                        </path>
                    </svg></button>
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
                        @foreach ($test as $m)
                            @if ($m->class_id == $class)
                                <th colspan="2">
                                    <input type="hidden" name="sid" value="{{ $m->subject_id }}">
                                    {{ \Illuminate\Support\Facades\DB::table('subjects')->where('id', $m->subject_id)->value('subname') }}
                                </th>
                            @endif
                        @endforeach
                        <th rowspan="2">Total</th>
                        <th rowspan="2">Grade</th>
                        <th rowspan="2">Pos</th>
                    </tr>
                    <tr>
                        @foreach ($test as $m)
                            @if ($m->class_id == $class)
                                {{-- <th>Theory(60)</th>
                            <th>Practical(40)</th> --}}
                                <th>Grade Point</th>
                                <th>Grade</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <?php $row = 1;
                    $row1 = 1; ?>
                    @foreach ($test3 as $t)
                        <tr>
                            <td>{{ $row++ }}</td>
                            <td>{{ \Illuminate\Support\Facades\DB::table('users')->where('id', $t->student_id)->value('name') }}
                            </td>
                            @foreach ($test as $m) 
                                @foreach ($test2 as $mak)
                                    @if ($t->student_id == $mak->student_id && $m->subject_id == $mak->subject_id)
                                        @if ($mak->class_id == $class && $mak->exam_id == $exam)
                                            {{-- <td>{{$mak->prac}}</td>
                            <td>{{$mak->theory}}</td> --}}
                                            <td>{{ \Illuminate\Support\Facades\DB::table('grades')->where('gpoint', $mak->gpoint)->value('gpoint') }}
                                            </td>
                                            <td>{{ \Illuminate\Support\Facades\DB::table('grades')->where('gpoint', $mak->gpoint)->value('name') }}</td>

                                            {{-- <td>{{$mak->grade_id}}</td> --}}
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                            @foreach ($test2 as $mak)
                                @if ($t->student_id == $mak->student_id && $m->subject_id == $mak->subject_id)
                                    @if ($mak->class_id == $class && $mak->exam_id == $exam)
                                        <td>
                                            {{ \Illuminate\Support\Facades\DB::table('exam_records')->where([['student_id', $t->student_id],['exam_id',$exam]])->value('total') }}
                                        </td>
                                        {{-- <td>   {{$mak->grade_id}}  </td> --}}
                                        <td>
                                            {{ \Illuminate\Support\Facades\DB::table('exam_records')->where([['student_id', $t->student_id],['exam_id',$exam]])->value('ave') }}

                                        </td>
                                        <td>{{ $row1++ }}</td>
                                    @endif
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </p>
        </div>
    </div>
@endsection
