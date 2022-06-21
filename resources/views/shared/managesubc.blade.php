@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">Manage Subject Combination</h2>
            
            </div>
            
            <!-- /.col-md-6 text-right -->
        </div>
        @if (session('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
            <div class="alert alert-success">{{ session('message') }}</div>
        </div>
        @endif
        <div class="panel-body p-20">
        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                  <tr>
                    <th>#</th>
                    <th>Class</th>
                       <th>  Section</th>
                    <th>Subject </th>
                    <th>Teacher</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $row=1; ?>
                @foreach ($subc as $item)
                <tr>
                    <th scope="row">{{ $row++ }}</th>
                    <td>{{ \Illuminate\Support\Facades\DB::table('classes')->where('id',$item->class_id)->value('classname')}}</td>    
                  <td>  {{ \Illuminate\Support\Facades\DB::table('classes')->where('id',$item->class_id)->value('section')}}</td>
                    <td>{{ \Illuminate\Support\Facades\DB::table('subjects')->where('id',$item->subject_id)->value('subname')}}</td>
                    <td>{{ \Illuminate\Support\Facades\DB::table('users')->where('id',$item->teacher_id)->value('name')}}</td>
                    {{-- <td>{{ $item->class_id }}</td>
                    <td>{{ $item->subject_id }}</td>
                    <td>{{ $item->teacher_id }}</td> --}}
                    <td>
                        <button type="button" class="fa fa-edit btnedit" data-bs-toggle="modal" data-bs-target="#myModal" value="{{ $item->id }}" title="Edit Record"></button>
                    &nbsp; &nbsp;                              
                      <a href="{{ url('/deleteexam/' . $item->id) }}"><i class="fa fa-remove" title="Delete Record"></i> </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        <!-- /.col-md-12 -->    
        </div>
    </div>
@endsection
