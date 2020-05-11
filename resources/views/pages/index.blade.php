@extends('layouts.app')
@section('links')
    <link href="{{ asset('css/style_home.css') }}" rel="stylesheet">
@endsection

@section('content')
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h1 class="font-weight-bold mb-0 text-light rounded-lg">Welcome to Amplitudo Academy!</h1>
                    <p class="lead mt-0 w-50 desc text-light rounded-bottom">Become a developer with us!</p>
                </div>
            </div>
        </div>
    </header>
    <div class="marketing-container">
        <div class="marketing">
            <h3>
                Various online programming courses
                <i class="fas fa-laptop-code"></i>
            </h3>
        </div>
        <div class="marketing">
            <h3>
                Find the right instructor for you
                <i class="fas fa-chalkboard-teacher"></i>
            </h3>
        </div>
        <div class="marketing">
            <h3>
                Learn on your schedule
                <i class="fas fa-calendar-alt"></i>
            </h3>
        </div>
    </div>
    <div class="course-heading-container">
        <h3 class="course-heading">Our latest courses</h3>
    </div>
    <div class="courses-container">
        @foreach($courses as $course)
            <div class="card" style="width: 18rem;">
                <a href="#"><img src="{{($course->getFirstMediaUrl()) ? $course->getFirstMediaUrl() : asset('images/course-image.jpg') }}" class="card-img-top" alt="course-image.jpg"></a>
                <div class="card-body">
                    <h5 class="card-title">{{$course->title}}</h5>
                    <p class="card-text">{{$course->about_course}}</p>
                </div>
                <div class="card-body">
                    <a href="{{url("/courses/$course->id")}}" class="card-link">Preview Course</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
