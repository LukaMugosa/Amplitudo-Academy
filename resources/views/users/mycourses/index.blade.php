@extends('layouts.dashboard_layout')

@section('content')
    <div class="col-md-6 ml-auto mr-auto">
        <div class="card">
            <div class="card-header bg-danger mb-2">
                <h3 class="card-title">Your Courses</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-4">
                <table class="table mt-2" id="example1">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Number of enrollments</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$course->id}}.</td>
                                <td>{{$course->title}}</td>
                                <td><h2><span class="badge badge-secondary">{{$course->studentsOnThisCourse()}}</span></h2></td>
                                <td>
                                    <a href="{{url("/courses/$course->id")}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                    {!! Form::open(['action' => ['CoursesController@destroy',$course->id],'method' => 'POST' , 'class' => 'mt-0' , 'style' => 'display:inline-block;']) !!}
                                    {{Form::hidden('_method','DELETE')}}
                                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-group-sm'] )  }}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


        <!-- /.card -->
    </div>
@section('additional-scripts')
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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
@endsection

@endsection
