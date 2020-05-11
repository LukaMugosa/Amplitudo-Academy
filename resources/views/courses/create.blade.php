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
                                <h3 class="card-title">Add New Course</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if(isset($success))
                                <div class="alert alert-info" id="error1">{{$success}} </div>
                                <script>
                                    const error1 = document.getElementById('error1');
                                    setTimeout(() => {
                                        if(error1)
                                            error1.classList.add('hide');
                                    },3500);
                                </script>
                            @endif
                            {!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                <div class="card-body">
                                    <div class="form-group">
                                        {{Form::label('title', 'Course Title')}}
                                        {{Form::text('title', '', ['class' => 'form-control ', 'placeholder' => 'Enter Course Title','id' => 'course-title'])}}
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('about_course', 'About course')}}
                                        {{Form::textarea('about_course', '', ['class' => 'form-control', 'placeholder' => 'About your course', 'style' => 'height:100px;'])}}
                                        @error('about_course')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="card card-outline card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    Describe Your Course In Detail
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body pad">
                                                <div class="mb-3">
                                                    {{Form::textarea('description', '', ['class' => 'textarea', 'placeholder' => 'Place some text here', 'style' => 'width: 100%; height: 800px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'])}}
                                                </div>
                                                @error('description')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('header_photo', 'Upload header photo')}}
                                        {{Form::file('header_photo')}}
                                        @error('header_photo')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('video_material', 'Upload video material')}}
                                        {{Form::file('video_material')}}
                                        @error('video_material')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('price', 'Enter price for Your course $')}}
                                        {{Form::number('price')}}
                                        @error('price')
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
        <!-- /.content -->
    </div>
@endsection
