@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-6">
                <h2 class="title">Grades</h2>
            
            </div>
            
            <!-- /.col-md-6 text-right -->
        </div>

        <div class="panel-body p-20">
        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Range</th>
                    <th>Remark</th>
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
