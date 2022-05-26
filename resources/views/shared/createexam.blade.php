@extends('layouts.app')
@section('content')
    <div class="content">
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
