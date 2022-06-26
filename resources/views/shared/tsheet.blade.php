<?php $row=1;?>
@foreach($test2 as $t)
<tr>
    <td>{{$row++;}}</td>
    <td>{{ \Illuminate\Support\Facades\DB::table('users')->where('id', $t->student_id)->value('name') }}</td>
    @foreach($test2 as $mak)
    @if($t->student_id==$mak->student_id && $t->subject_id==$mak->subject_id)
    @foreach($test as $m)
    @if($mak->class_id==$class && $mak->exam_id==$exam)
    <td>{{$mak->prac}}</td>
    <td>{{$mak->theory}}</td>
    <td>{{$mak->total}}</td>
    @endif
     @endforeach
     @endif
     @endforeach
</tr>
@endforeach