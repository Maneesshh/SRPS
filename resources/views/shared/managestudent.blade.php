@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h2 class="title">Manage Student</h2>

            </div>

            <!-- /.col-md-6 text-right -->
        </div>

        <div class="panel-body p-20">
            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Student Name</th>
                        <th>Roll No</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $row = 1; ?>
                    <tr>
                        <th scope="row">{{ $row++ }}</th>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td>
                            <a href=""><i class="fa fa-edit" title="Edit Record"></i> </a>&nbsp;&nbsp;
                            <a href=""><i class="fa fa-remove" title="Delete Record"></i> </a>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
@endsection
