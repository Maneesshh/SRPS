@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h2 class="title">Add Subject Combination</h2>
            </div>
        <form class="form-inline" method="post">
            <div class="form-group">
                <label for="default" class="col-sm-1 control-label">Class:</label>
                <div class="col-sm-7">
                    <select name="class" class="form-control" id="default" required="required">
                        <option value="">Select Class</option>
                        <option value="">cla1</option>

                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="default" class="col-sm-2 control-label">Subject</label>
                <div class="col-sm-7">
                    <select name="subject" class="form-control" id="default" required="required">
                        <option value="">Select Subject</option>

                        <option value="">sub1</option>
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
