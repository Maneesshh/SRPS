@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h2 class="title">Create Student Class</h2>
            </div>
            @if (session('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
                <div class="alert alert-success">{{session('message')}}</div>
            </div>
            @endif
            <form class="form-inline" action="{{ 'insert-class' }}" method="POST">
                @csrf
                    <div class="form-group col-sm-7">
                        <label for="classname">Class Name:</label><input type="text" class="form-control"
                            placeholder="Eg- One, Two, Three,etc" id="classname" name="classname" required>
                    </div>
                    <div class="form-group col-sm-7">
                        <label for="classname"></label>Class Name(in Numbers):
                        <input type="number" class="form-control" placeholder="Eg- 1, 2, 3,etc" id="classnum" name="classnum"
                            required>
                    </div>
                    <div class="form-group col-sm-7">
                        <label for="section">Section:</label><input type="text" class="form-control"
                            placeholder="Eg- A, B, C,etc" name="section" required />
                    </div>
                    <br>
                    <div class="row my-2">
                        <div class="col-5"></div>
                        <div class="col mb-3">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
            </form>
        </div>
    @endsection
