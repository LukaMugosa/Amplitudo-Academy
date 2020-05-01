@extends('layouts.dashboard_layout')

@section('content')
    <div class="col-md-6 ml-auto mr-auto">
        <div class="card">
            <div class="card-header bg-danger">
                <h3 class="card-title">Simple Full Width Table</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table" id="example1">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Number of enrollments</th>
                            <th>Preview Course</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$course->id}}.</td>
                                <td>{{$course->title}}</td>
                                <td><h2><span class="badge badge-secondary">{{$course->studentsOnThisCourse()}}</span></h2></td>
                                <td>
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-eye"></i></button>
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
