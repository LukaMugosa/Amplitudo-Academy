@extends('layouts.dashboard_layout')
@section('links')
    <style>
        .hide{
            display: none;
        }
        .card{
            width: 800px;
        }
        .content-wrapper{
            overflow: hidden;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="col-md-6 ml-5 mr-5">
            <div class="card">
                <div class="card-header bg-danger mb-2">
                    <h3 class="card-title">Your Reports</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-4">
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus-square nav-icon"></i> Add New</button>
                    <div class="field ">
                        @error('title')
                        <div class="alert alert-danger w-50" id="error1" role="alert">{{$message}}</div>
                        @enderror
                        @error('body')
                        <div class="alert alert-danger w-75" id="error2" role="alert">{{$message}}</div>
                        @enderror
                        @error('intended_user_id')
                        <div class="alert alert-danger w-75" id="error3" role="alert">{{$message}}</div>
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
                            <th>Written by</th>
                            <th>Intended to</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Preview</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td>{{$report->id}}.</td>
                                <td>{{$report->user->name}}</td>
                                <td>{{$report->intendedUser->name}}</td>
                                <td>{{$report->title}}</td>
                                <td>{{$report->created_at}}</td>
                                <td>{{$report->updated_at}}</td>
                                <td>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target-id="{{$report->id}}" data-target="#myModal"><i class="fas fa-eye"></i></button>
                                    @if(auth()->user()->id === $report->user_id)
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target-id="{{$report->id}}" data-target="#modal-default-3"><i class="fas fa-edit"></i></button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="modal fade" id="modal-default-3" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Report</h4>
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
                        <h4>Report Content</h4>
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
                        {!! Form::open(['action' => 'ReportsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="card-body">
                            <div class="form-group">
                                {{Form::label('title', 'Title')}}
                                {{Form::text('title', '', ['class' => 'form-control ', 'placeholder' => 'Enter Full Title Name','id' => 'exampleInputName'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('users', 'Select User')}}
                                {{Form::select('intended_user_id', $usersList,null, ['class' => 'form-control ', 'placeholder' => 'Please select'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('body', 'Report Content')}}
                                {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Place some text here'])}}
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
                console.log(1);
                $.get( "/reports/" + id, function( data ) {
                    $(".modal-body").html(data.html);
                });
            });
        });
        $(document).ready(function(){
            $("#modal-default-3").on("show.bs.modal", function(e) {
                var id = $(e.relatedTarget).data('target-id');
                $.get( "/reports/edit/" + id, function( data ) {
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
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
    <script>
        const error1 = document.getElementById('error1');
        const error2 = document.getElementById('error2');
        const error3 = document.getElementById('error3');
        const success = document.getElementById("success1");
        setTimeout(() => {
            if(error1)
                error1.classList.add('hide');
            if(error2)
                error2.classList.add('hide');
            if(error3)
                error3.classList.add('hide');
        },3000);
    </script>
@endsection



