@extends('layouts.dashboard_layout')

@section('content')
    <div class="content-wrapper">
        <section class="content w-75 ml-auto mr-auto mt-4">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Supervisor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if(session()->has('success'))
                                <div class="alert alert-dark">{{$success}} </div>
                            @endif
                            {!! Form::open(['action' => 'SupervisorsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    {{Form::label('name', 'Full Name')}}
                                    {{Form::text('name', '', ['class' => 'form-control ', 'placeholder' => 'Enter Full Name','id' => 'exampleInputName'])}}
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    {{Form::label('exampleInputEmail1', 'Email')}}
                                    {{Form::email('email', '', ['class' => 'form-control', 'id' => 'exampleInputEmail1', 'placeholder' => 'Enter email'])}}
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    {{Form::label('exampleInputPassword1', 'Password')}}
                                    {{Form::password('password1', ['class' => 'form-control', 'id' => 'exampleInputPassword1', 'placeholder' => 'Password'])}}
                                    @error('password1')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    {{Form::label('exampleInputPassword1', 'Repeat Password')}}
                                    {{Form::password('password2', ['class' => 'form-control', 'id' => 'exampleInputPassword2', 'placeholder' => 'Repeat Password'])}}
                                    @error('password2')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content -->
@endsection
@section('additional-scripts')
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.validator.setDefaults({
                submitHandler: function () {
                    alert( "Form successful submitted!" );
                }
            });
            $('#quickForm').validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password1: {
                        required: true,
                        minlength: 5
                    },
                    password2: {
                        required: true,
                        minlength: 5,
                        equalTo: '#password1'
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection

