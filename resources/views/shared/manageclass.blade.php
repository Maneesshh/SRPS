@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">Manage Classes</h2>

            </div>
            @if (session('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
                <div class="alert alert-success">{{ session('message') }}</div>
            </div>
            @endif
            <!-- /.col-md-6 text-right -->
        </div>

        <div class="panel-body p-20">
            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Class Name</th>
                        <th>Class Name Numeric</th>
                        <th>Section</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $row = 1; ?>
                    @foreach ($classes as $item)
                        <tr>
                            <th scope="row">{{ $row++ }}</th>
                            <td>{{ $item->classname }}</td>
                            <td>{{ $item->classnum }}</td>
                            <td>{{ $item->section }}</td>
                            <td>
                                <button type="button" class="fa fa-edit btnedit" data-bs-toggle="modal"
                                data-bs-target="#myModal" value="{{ $item->id }}" title="Edit Record"></button>
                            &nbsp; &nbsp;                                <a href="{{ url('/delete/' . $item->id) }}"><i class="fa fa-remove"
                                        title="Delete Record"></i> </a>
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
                <h4 class="modal-title">Edit and Update class</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-inline" action="{{ 'update-class' }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="classid" name="classid" value="">
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
                            placeholder="Eg- A, B, C,etc" id="section" name="section" required />
                    </div>
                    <br>
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
                var cls_id = $(this).val();
                //    alert(sub_id);
                $.ajax({
                    type: "GET",
                    url: "/editclass/" + cls_id,
                    success: function(response) {
                        $('#classid').val(response.classes.id);
                        $('#classname').val(response.classes.classname);
                        $('#classnum').val(response.classes.classnum);
                        $('#section').val(response.classes.section);
                        // console.log(response);
                    }
                });

            });
        });
</script>
@endsection
