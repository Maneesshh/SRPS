@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h2 class="title">Manage Exam</h2>
            
            </div>
            
            <!-- /.col-md-6 text-right -->
        </div>
        @if (session('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show">
            <div class="alert alert-success">{{ session('message') }}</div>
        </div>

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
                <tr>
                    <th scope="row">{{ $row++}}</th>
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


        <!-- /.col-md-12 -->    
        </div>
    </div>
@endsection
