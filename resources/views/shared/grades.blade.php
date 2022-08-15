@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row page-title-div">
            <div class="col-md-10">
                <h2 class="title">Grades</h2>
            </div>
            @if (session('message'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show">
                    <div class="alert alert-success">{{ session('message') }}</div>
                </div>
            @endif

            <!-- /.col-md-6 text-right -->
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Add new Grade</button>
        <div class="panel-body p-20">
            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Grade Point</th>
                        <th>Remark</th>
                        <th>Range</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $row = 1; ?>
                    @foreach ($grades as $item)
                        <tr>
                            <td>{{ $row++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->gpoint }}</td>
                            <td>{{ $item->remarks }}</td>
                            <td>{{ $item->marks_from }}-{{ $item->marks_to }}</td>
                            <td>
                                <button type="button" class="fa fa-edit btnedit" data-bs-toggle="modal"
                                    data-bs-target="#myModal2" value="{{ $item->id }}" title="Edit Record"></button>
                                &nbsp; &nbsp; <a href="{{ url('/deletegrade/' . $item->id) }}"><i class="fa fa-remove"
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
                    <h4 class="modal-title">Add new Grade</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="form" action="{{ 'addgrade' }}" method="POST">
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Grade Name')" />
                            <x-input id="gname" class="block mt-1 w-full" type="text" name="gname" required autofocus />
                        </div><br>
                        <div>
                            <x-label for="gpoint" :value="__('Grade Point')" />
                            <x-input id="gname" class="block mt-1 w-full" type="number" step="any" name="gpoint" max="4" required
                                autofocus />
                        </div>
                        <!-- Marks from -->
                        <div class="mt-4">
                            <x-label for="Marks from" :value="__('Marks from')" />

                            <x-input id="marksf" class="block mt-1 w-full" type="number" name="marksf" max="90" required />
                        </div>
                        <div class="mt-4">
                            <x-label for="Marks to" :value="__('Marks to')" />

                            <x-input id="markst" class="block mt-1 w-full" type="number" name="markst" max="100" required />
                        </div>
                        <!-- Remarks -->
                        <div class="mt-4">
                            <x-label for="remarks" :value="__('Remarks')" />

                            <x-input id="remarks" class="block mt-1 w-full" type="text" name="remarks" required />
                        </div>
                        <div class="row my-2">
                            <div class="col-5"></div>
                            <div class="col mb-3">
                                <button type="submit" class="btn btn-primary">Add</button>
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
    <div class="modal" id="myModal2">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Grade</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="form" action="{{ 'updategrade' }}" method="POST">
                        @csrf
                        @method('PUT')
                        <x-input type="hidden" name="gid" id="gid" />
                        <div>
                            <x-label for="gname" :value="__('Grade Name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="gname" required autofocus />
                        </div><br>
                        <div>
                            <x-label for="gpoint" :value="__('Grade Point')" />
                            <x-input id="gpoint" class="block mt-1 w-full" type="number" step="any" name="gpoint" max="4" required
                                autofocus />
                        </div>
                        <!-- Marks from -->
                        <div class="mt-4">
                            <x-label for="markf" :value="__('Marks from')" />

                            <x-input id="markf" class="block mt-1 w-full" type="number" name="marksf" max="90" required />
                        </div>
                        <div class="mt-4">
                            <x-label for="markt" :value="__('Marks to')" />

                            <x-input id="markt" class="block mt-1 w-full" type="number" name="markst" max="100" required />
                        </div>
                        <!-- Remarks -->
                        <div class="mt-4">
                            <x-label for="remark" :value="__('Remarks')" />

                            <x-input id="remark" class="block mt-1 w-full" type="text" name="remark" required />
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
                var g_id = $(this).val();
                //    alert(g_id);
                $.ajax({
                    type: "GET",
                    url: "/editgrade/" + g_id,
                    success: function(response) {
                        $('#gid').val(response.grades.id);
                        $('#name').val(response.grades.name);
                        $('#gpoint').val(response.grades.gpoint);
                        $('#markf').val(response.grades.marks_from);
                        $('#markt').val(response.grades.marks_to);
                        $('#remark').val(response.grades.remarks);
                        // console.log(response);
                    }
                });

            });
        });
    </script>
@endsection
