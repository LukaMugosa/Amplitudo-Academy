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
                    <h3 class="card-title">All Payments</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-4">
                    <table class="table mt-2" id="example1">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>From user</th>
                                <th>Purpose of payment</th>
                                <th>Amount</th>
                                <th>Credit card number</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td><span class="badge badge-danger">{{$payment->id}}</span></td>
                                <td><span class="badge badge-success">{{$payment->user->name}}</span></td>
                                <td><span class="badge badge-info">{{$payment->purpose}}</span></td>
                                <td><span class="badge badge-warning">{{$payment->amount}} &euro;</span></td>
                                <td><span class="badge badge-dark">{{$payment->credit_card_number}}</span></td>
                                <td><span class="badge badge-light">{{$payment->created_at}}</span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.modal -->
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
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@endsection



