@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">Add Teachers Combination</h2>
            </div>
            @if (session('message'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show">
                <div class="alert alert-success">{{ session('message') }}</div>
            </div>
        @endif
        <form class="form-inline" method="post">
            @csrf
            <div class="form-group">
                <label for="default" class="col-sm-2 control-label">Teachers</label>
                <div class="col-sm-7">
                    <select name="teachers" class="form-control" id="default" required="required">
                        <option value="">Select Teachers</option>
                         @foreach($users as $items)
                        <option value="{{$items->id}}">{{$items->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="default" class="col-sm-1 control-label">Class:</label>
                <div class="col-sm-7">
                    <select name="class" class="form-control" id="default" required="required">
                        <option value="">Select Class</option>
                        @foreach($classes as $items)
                        <option value="{{$items->id}}">{{$items->classname}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="default" class="col-sm-2 control-label">Subject</label>
                <div class="col-sm-7">
                    <select name="subject" class="form-control" id="default" required="required">
                        <option value="">Select Subject</option>
                         @foreach($subjects as $items)
                        <option value="{{$items->id}}">{{$items->subname}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-5"></div>
                <div class="col mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>  
            
        </form>

    </div>
@endsection
