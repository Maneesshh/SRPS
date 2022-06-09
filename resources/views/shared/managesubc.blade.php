@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">Manage Subject Combination</h2>
            
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
                  <tr>
                    <th>#</th>
                    <th>Class and Section</th>
                    <th>Subject </th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td><?php ?></td>
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
