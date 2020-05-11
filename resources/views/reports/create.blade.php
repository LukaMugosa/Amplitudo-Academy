@extends('layouts.dashboard_layout')
@section('links')
    <style>
        .hide{
            display: none;
        }
    </style>
@endsection
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
                                <h3 class="card-title">Add New Mentor</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if(session()->has('success'))
                                <div class="alert alert-success" id="error1">{{session()->get('success')}} </div>
                                <script>
                                    const error1 = document.getElementById('error1');
                                    setTimeout(() => {
                                        if(error1)
                                            error1.classList.add('hide');
                                    },3500);
                                </script>
                            @endif
                            {!! Form::open(['action' => 'ReportsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class="card-body">
                                <div class="form-group">
                                    {{Form::label('title', 'Title')}}
                                    {{Form::text('title', '', ['class' => 'form-control ', 'placeholder' => 'Enter Full Title Name','id' => 'exampleInputName'])}}
                                    @error('title')
                                        <div class="alert alert-danger" id="error_1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    {{Form::label('users', 'Select User')}}
                                    {{Form::select('intended_user_id', $usersList,null, ['class' => 'form-control ', 'placeholder' => 'Please select'])}}
                                    @error('intended_user_id')
                                        <div class="alert alert-danger" id="error_2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    {{Form::label('body', 'Report Content')}}
                                    {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Place some text here'])}}
                                    @error('body')
                                        <div class="alert alert-danger" id="error_3">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="justify-content-center"></div>
                            {{Form::submit('Submit',['class' => 'form-control btn btn-primary mb-5','style' => 'width:600px;margin-left:100px'])}}
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
        <!-- /.content -->
    </div>
@endsection
@section('additional-scripts')
    <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
    <script>
        const error_1 = document.getElementById('error_1');
        const error_2 = document.getElementById('error_2');
        const error_3 = document.getElementById('error_3');
        setTimeout(() => {
            if(error_1)
                error_1.classList.add('hide');
            if(error_2)
                error_2.classList.add('hide');
            if(error_3)
                error_3.classList.add('hide');
        },5000);
    </script>

@endsection

