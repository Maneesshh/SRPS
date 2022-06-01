@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h2 class="title">Create Subject</h2>
            </div>
        <form class="form-inline" action="">
            <div class="form-group">
                <label for="subname">Subject Name:</label><input type="text" class="form-control" id="subname" placeholder="Subject Name"  required>
            </div>
            <div class="form-group">
                <label for="class"></label>Subject code:
                <input type="text" class="form-control" id="subcode" placeholder="Subject code " required>
            </div><br>
            <div class="row my-2">
                <div class="col-5"></div>
                <div class="col mb-3">
                    <button type="submit" class="btn btn-primary" >Create</button>
                </div>
            </div>
        </form>
    </div>
@endsection
