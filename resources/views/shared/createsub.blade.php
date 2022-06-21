@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h2 class="title">Create Subject</h2>
            </div>
            @if (session('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
                <div class="alert alert-success">{{ session('message') }}</div>
            </div>
            @endif
            <form class="form-inline" action="{{ 'insert-sub' }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="subname">Subject Name:</label><input type="text" class="form-control" name="subname"
                        placeholder="Subject Name" required>
                </div>
                <div class="form-group">
                    <label for="class"></label>Subject code:
                    <input type="text" class="form-control" name="subcode" placeholder="Subject code " required>
                </div>
                <div class="form-group">
                    <label for="default" class="col-sm-2 control-label">Subject Type</label>
                    <select name="sub-type" class="form-control" id="default" required="required">
                        <option value="">Select Subject Type</option>
                        <option value="Compulsory">Compulsory</option>
                        <option value="Electives">Electives</option>
                    </select>
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
