@extends('layouts.dashboard_layout')
@section('links')
    <style>
        .hide{
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="col-md-6 ml-auto mr-auto">
        <div class="card">
            <div class="card-header bg-danger mb-2">
                <h3 class="card-title">Projects Given By You</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-4">
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-lg">Add New</button>
                <div class="field ">
                    @error('title')
                    <div class="alert alert-danger w-50" id="error1" role="alert">{{$message}}</div>
                    @enderror
                    @error('project_description')
                    <div class="alert alert-danger w-75" id="error2" role="alert">{{$message}}</div>
                    @enderror
                    @if(session()->has('success'))
                        <div class="alert alert-success w-50" id="success1">
                            {{ session()->get('success') }}
                            <script>
                                const success = document.getElementById("success1");
                                setTimeout(() => {
                                    success.classList.add('hide');
                                },3000);
                            </script>
                        </div>
                    @endif
                    @if(session()->has('success2'))
                        <div class="alert alert-success w-50" id="success2">
                            {{ session()->get('success2') }}
                            <script>
                                const success = document.getElementById("success2");
                                setTimeout(() => {
                                    success.classList.add('hide');
                                },3000);
                            </script>
                        </div>
                    @endif
                </div>
                <table class="table mt-2" id="example1">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{$project->id}}.</td>
                            <td>{{$project->title}}</td>
                            <td>{{$project->deadline}}</td>
                            <td><span class="badge badge-info">{{($project->deadline >= now()) ? 'In progress' : 'Expired'}}</span></td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target-id="{{$project->id}}" data-target="#myModal"><i class="fas fa-eye"></i></button>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target-id="{{$project->id}}" data-target="#modal-default-3"><i class="fas fa-edit"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <div class="modal fade" id="modal-default-3" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body-3"></div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Description</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body-2">
                        {!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="card-body">
                            <div class="form-group">
                                {{Form::label('title', 'Title')}}
                                {{Form::text('title', '', ['class' => 'form-control ', 'placeholder' => 'Enter Full Title Name','id' => 'exampleInputName'])}}
                            </div>
                            <div class="form-group">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Describe Project In Detail
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body pad">
                                        <div class="mb-3">
                                            {{Form::textarea('project_description', '', ['class' => 'textarea', 'placeholder' => 'Place some text here', 'style' => 'width: 100%; height: 800px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                {{Form::label('inputDeadline', 'Dead line')}}
                                {{Form::date('deadline', \Carbon\Carbon::now())}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {{Form::submit('Submit',['class' => 'btn btn-success'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.card -->
    </div>
@endsection
@section('additional-scripts')
    <script>
        $(document).ready(function(){
            $("#myModal").on("show.bs.modal", function(e) {
                var id = $(e.relatedTarget).data('target-id');
                $.get( "/projects/" + id, function( data ) {
                    $(".modal-body").html(data.html);
                });

            });
        });
        $(document).ready(function(){
            $("#modal-default-3").on("show.bs.modal", function(e) {
                var id = $(e.relatedTarget).data('target-id');
                $.get( "/projects/edit/" + id, function( data ) {
                    $(".modal-body-3").html(data.html);
                });

            });
        });
    </script>
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": false,
            });
        });
    </script>
    <script>
        const error1 = document.getElementById('error1');
        const error2 = document.getElementById('error2');
        const success = document.getElementById("success1");
        setTimeout(() => {
            if(error1)
                error1.classList.add('hide');
            if(error2)
                error2.classList.add('hide');
        },3000);
    </script>
@endsection



