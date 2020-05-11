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
                <h3 class="card-title">Projects to be done</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-4">
                <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#modal-default-3"><i class="fas fa-upload"></i>Turn IN</button>
                @error('project1')
                <div class="alert alert-danger w-50" id="error1" role="alert">{{$message}}</div>
                @enderror
                @error('project')
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
                <table class="table mt-2" id="example1">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Done</th>
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
                            <td><span class="badge badge-info">{{($project->users[auth()->user()->id]->pivot->is_done) ? "Done" : "Not Done"}}</span></td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target-id="{{$project->id}}" data-target="#myModal"><i class="fas fa-eye"></i></button>
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
                        <h4 class="modal-title">Upload Your Project</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body-3">
                        {!! Form::open(['action' => 'StudentProjectController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="card-body">
                            <div class="form-group">
                                {{Form::label('project1', 'Select Project Title')}}
                                <select name="project1" id="project1" class="form-control">
                                    <option value="" disabled selected>Select title</option>
                                    @foreach($projectsList as $project)
                                        <option value="{{$project->id}}">{{$project->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                {{Form::label('project', 'Please upload your .zip or .rar file')}}
                                {{Form::file('project')}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {{Form::submit('Submit',['class' => 'btn btn-success'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
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
        <!-- /.card -->
    </div>
@endsection
@section('additional-scripts')
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
        setTimeout(() => {
            if(error1)
                error1.classList.add('hide');
            if(error2)
                error2.classList.add('hide');
        },3000);
    </script>
    <script>
        $(document).ready(function(){
            $("#myModal").on("show.bs.modal", function(e) {
                var id = $(e.relatedTarget).data('target-id');
                $.get( "/projects/" + id, function( data ) {
                    $(".modal-body").html(data.html);
                });
            });
        });
    </script>
@endsection



