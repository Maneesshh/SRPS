@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h2 class="title">Create Exam</h2>
            </div>
        </div>
        @if (session('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
            <div class="alert alert-success">{{ session('message') }}</div>
        </div>
        <form class="form-inline" action="">
            <div class="form-group">
                <label for="examname">Exam Name:</label><input type="text" class="form-control" id="examname">
            </div>
            <div class="form-group">
                <label for="class"></label>Exam code:
                <input type="number" class="form-control" id="enum">
            </div><br>

            <div class="row my-2">
                <div class="col-5"></div>
                <div class="col mb-3">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection
