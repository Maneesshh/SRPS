@extends('layouts.app')
@section('content')
    <div class="content">
        <form class="form-inline" action="">
            <div class="form-group">
                <label for="examname">Exam Name:</label><input type="test" class="form-control" id="examname">
            </div>
            <div class="form-group">
                <label for="class"></label>Exam code:
                <input type="num" class="form-control" id="enum">
            </div><br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
    </div>
@endsection
