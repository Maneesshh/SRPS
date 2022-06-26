<?php $row=1;?>
@foreach($test2 as $t)
<tr>
    @foreach($marks as $mk)
    @if($mk->class_id==$class && $mk->exam_id==$exam)
    <td>{{$row++;}}</td>
    <td>{{ \Illuminate\Support\Facades\DB::table('users')->where('id', $mk->student_id)->value('name') }}</td>
    @foreach($test as $mak)
    <td>{{$mak->prac}}</td>
    <td>{{$mak->theory}}</td>
    <td>{{$mak->total}}</td>
    @endforeach
    @break
     @endif
     @if($loop->parent->count==$loop->iteration)
     @break
     @endif
     @endforeach
</tr>

@endforeach