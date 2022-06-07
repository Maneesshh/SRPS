@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">Manage Teachers</h2>

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
                        <th>Teachers Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $row = 1; ?>
                    @foreach ($users as $item)
                        <tr>
                            <th scope="row">{{ $row++ }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>
                                <button type="button" class="fa fa-edit btnedit" data-bs-toggle="modal"
                                data-bs-target="#myModal" value="{{ $item->id }}" title="Edit Record"></button>
                            &nbsp; &nbsp;                                <a href="{{ url('/deleteuser/' . $item->id) }}"><i class="fa fa-remove"
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
                <h4 class="modal-title">Edit and Update Teachers</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-inline" action="{{ 'updateteacher' }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="tid" name="tid" value="">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6><br>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="name"
                                id="name"><br>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6><br>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="email"
                                id="email"><br>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6><br>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="phone"
                                id="phone"><br>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6><br>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="text" class="form-control" name="address"
                                id="address"><br>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Gender</h6><br>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <select class="form-control" name="gender"  id="gender" required="required">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>

                            </select><br>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Image</h6><br>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            <input type="file" id="photo" name="photo"
                                accept=".png , .jpeg , .jpg" /><br>
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
                var t_id = $(this).val();
                //    alert(t_id);
                $.ajax({
                    type: "GET",
                    url: "/editteacher/" + t_id,
                    success: function(response) {
                        $('#tid').val(response.user.id);
                        $('#name').val(response.user.name);
                        $('#email').val(response.user.email);
                        $('#phone').val(response.user.phone);
                        $('#gender').val(response.user.gender);
                        $('#address').val(response.user.address);


                        // console.log(response);
                    }
                });

            });
        });
</script>
@endsection
