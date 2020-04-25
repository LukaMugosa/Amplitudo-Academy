@extends('layouts.app')
@section('links')
    <link rel="stylesheet" href="{{asset('css/courses_style.css')}}">
@endsection

@section('content')
    <div class="heading-content">
        <form class="position" method="post" action="{{ redirect('#') }}">
            <div class="text-content">
                <h2>What do we offer?</h2>
                <p>Large number of online courses for web and software development.</p>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search for courses...">
                <a class="search-icon" href="#display-courses"><i class="fas fa-search"></i></a>
            </div>
        </form>
    </div>
    <h2 id="head">Our Courses</h2>
    <div class="content" id="display-courses">
        @foreach($courses as $course)
            <div class="card">
                <a href=""><img src="{{asset("images/course-image.jpg")}}" class="card-img-top" alt="..."></a>
                <div class="card-body">
                    <h5 class="card-title">{{$course->title}}</h5>
                    <i class="text-warning fas fa-star"></i><i class="text-warning fas fa-star"></i><i class="text-warning fas fa-star"></i><i class="text-warning fas fa-star"></i><i class="text-warning fas fa-star-half-alt"></i> <span>4.5</span>
                    <p class="card-text">{{$course->about_course}}</p>
                    <span class="badge-warning p-2">Price: ${{$course->price}}</span>
                    <a href="/courses/{{$course->id}}" class="btn btn-primary mt-3">View Full Course</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
