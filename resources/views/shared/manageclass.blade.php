@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h2 class="title">Manage Classes</h2>

            </div>

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
                    <?php $row=1; ?>
                    @foreach ($classes as $item)
                        <tr>
                            <th scope="row">{{$row++}}</th>
                            <td>{{$item->classname}}</td>
                            <td>{{$item->classnum}}</td>
                            <td>{{$item->section}}</td>
                            <td>
                                <a href=""><i class="fa fa-edit" title="Edit Record"></i> </a>&nbsp;&nbsp;
                                <a href=""><i class="fa fa-remove" title="Delete Record"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


            <!-- /.col-md-12 -->
        </div>
    </div>
@endsection
