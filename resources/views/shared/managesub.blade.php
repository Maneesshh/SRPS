@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h2 class="title">Manage Subject</h2>

            </div>
            @if (session('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
                <div class="alert alert-success">{{ session('message') }}</div>
            </div>
        </div>

        <div class="panel-body p-20">
            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Subject Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $row = 1; ?>
                    @foreach ($subjects as $item)
                        <tr>
                            <th scope="row">{{ $row++ }}</th>
                            <td>{{ $item->subname }}</td>
                            <td>{{ $item->subcode }}</td>
                            <td>{{ $item->sub_type }}</td>
                            <td>
                                <button type="button" class="fa fa-edit btnedit" data-bs-toggle="modal"
                                    data-bs-target="#myModal" value="{{ $item->id }}" title="Edit Record"></button>
                                &nbsp; &nbsp;
                                {{-- <a href="{{url('/editsub/'.$item->id)}}"><i class="fa fa-edit" title="Edit Record"></i> </a>&nbsp;&nbsp; --}}
                                <a href="{{ url('/deletesub/' . $item->id) }}"><i class="fa fa-remove"
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
                    <h4 class="modal-title">Edit and Update Subject</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="form-inline" action="{{ 'update-sub' }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="subid" name="subid" value="">
                        <div class="form-group">
                            <label for="subname">Subject Name:</label><input type="text" class="form-control" id="subname"
                                name="subname" placeholder="Subject Name" required>
                        </div>
                        <div class="form-group">
                            <label for="class"></label>Subject code:
                            <input type="text" class="form-control" name="subcode" id="subcode"
                                placeholder="Subject code " required>
                        </div>
                        <div class="form-group">
                            <label for="default" class="col-sm-3 control-label">Subject Type</label>
                            <select name="sub-type" class="form-control" id="subtype" required="required">
                                <option value="">Select Subject Type</option>
                                <option value="Compulsory">Compulsory</option>
                                <option value="Electives">Electives</option>
                            </select>
                        </div>
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
                var sub_id = $(this).val();
                //    alert(sub_id);
                $.ajax({
                    type: "GET",
                    url: "/editsub/" + sub_id,
                    success: function(response) {
                        $('#subid').val(response.subject.id);
                        $('#subname').val(response.subject.subname);
                        $('#subcode').val(response.subject.subcode);
                        $('#subtype').val(response.subject.sub_type);
                        console.log(response);
                    }
                });

            });
        });
    </script>
@endsection
