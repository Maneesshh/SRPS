@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">Manage Exam</h2>
            
            </div>
            
            <!-- /.col-md-6 text-right -->
        </div>
        @if (session('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
            <div class="alert alert-success">{{ session('message') }}</div>
        </div>
       @endif
        <div class="panel-body p-20">
        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Term</th>
                    <th>Session</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $row=1; ?>
                @foreach ($exam as $item)
                        <tr>
                            <th scope="row">{{ $row++ }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->term }}</td>
                            <td>{{ $item->year }}</td>
                            <td>
                                <button type="button" class="fa fa-edit btnedit" data-bs-toggle="modal" data-bs-target="#myModal" value="{{ $item->id }}" title="Edit Record"></button>
                            &nbsp; &nbsp;                              
                              <a href="{{ url('/deleteexam/' . $item->id) }}"><i class="fa fa-remove" title="Delete Record"></i> </a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>


        <!-- /.col-md-12 -->    
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
    
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" >Edit and Update Exam</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
    
                <!-- Modal body -->
                <div class="modal-body">
                    <form class="form-inline" action="{{ 'updateexam' }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="examid" name="examid" >
                        <div class="form-group">
                            <label for="examname">Exam Name:</label><input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="class"></label>Term:
                            <input type="number" class="form-control" name="term" id="term">
                        </div><br>
                        <div class="form-group">
                            <label for="class"></label>Academic year:
                            <input type="text" class="form-control" name="year" id="year">
                        </div><br>
                        <div class="row my-2">
                            <div class="col-5"></div>
                            <div class="col mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
    
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
    
            </div>
        </div>
    </div>
    <script>
          $(document).ready(function() {
                $(document).on('click', '.btnedit', function() {
                    var e_id = $(this).val();
                    //    alert(sub_id);
                    $.ajax({
                        type: "GET",
                        url: "/editexam/" + e_id,
                        success: function(response) {
                            $('#examid').val(response.exam.id);
                            $('#name').val(response.exam.name);
                            $('#term').val(response.exam.term);
                            $('#year').val(response.exam.year);
                            // console.log(response);
                        }
                    });
    
                });
            });
    </script>
    @endsection
    