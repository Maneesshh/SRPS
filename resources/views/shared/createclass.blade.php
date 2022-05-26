@extends('layouts.app')
@section('content')
    <div class="content">
        <form class="form-inline" action="">
            <div class="form-group">
                <label for="classname">Class Name:</label><input type="text" class="form-control" id="classname">
            </div>
            <div class="form-group">
                <label for="classname"></label>Class Name(in Numbers):
                <input type="number" class="form-control" id="classnum">
            </div>
            <div class="form-group">
                <label for="section">Section:</label><input type="text" class="form-control" id="section"/>
            </div>
                <br>
                <div class="row my-2">
                    <div class="col-5"></div>
                    <div class="col mb-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>        </form> 
    </div>
@endsection
