@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">ADD Student</h2>

            </div>
        </div>
        @if (session('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
            <div class="alert alert-success">{{ session('message') }}</div>
        </div>
            <form class="form-inline" method="post">
                <div class="form-group">
                    <label for="default" class="col-sm-2 control-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="fullanme" class="form-control" id="fullanme" required="required"
                            autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="default" class="col-sm-2 control-label">Roll Id</label>
                    <div class="col-sm-10">
                        <input type="text" name="rollid" class="form-control" id="rollid" maxlength="5"
                            required="required" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="default" class="col-sm-2 control-label">Email id</label>
                    <div class="col-sm-10">
                        <input type="email" name="emailid" class="form-control" id="email" required="required"
                            autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label for="default" class="col-sm-2 control-label">Gender</label>
                    <div class="col-sm-10">
                        <input type="radio" name="gender" value="Male" required="required" checked="">Male <input
                            type="radio" name="gender" value="Female" required="required">Female <input type="radio"
                            name="gender" value="Other" required="required">Other
                    </div>
                </div>
                <div class="form-group">
                    <label for="default" class="col-sm-2 control-label">Class</label>
                    <div class="col-sm-10">
                        <select name="class" class="form-control" id="default" required="required">
                            <option value="">Select Class</option>
                            @foreach ($classes as $items)
                                <option value="{{ $items->name }}">{{ $items->classname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="col-sm-2 control-label">DOB</label>
                    <div class="col-sm-10">
                        <input type="date" name="dob" class="form-control" id="date">
                    </div>
                </div>
                <div class="form-group">
                    <div class="row my-2">
                        <div class="col-5"></div>
                        <div class="col mb-3">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
            </form>
        </div>
    @endsection
