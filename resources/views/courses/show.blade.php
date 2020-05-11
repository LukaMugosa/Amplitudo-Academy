@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/course_style.css')}}">
@endsection

@section('content')
    <div class="background-container">
        <div class="course-content">
            <h2>{{$course->title}}</h2>
            <h4>{{$course->about_course}}</h4>
            <small>Rating: {{substr($course->avgRating(),0,strlen($course->avgRating())-2)}} ({{$course->numOfRatings()}} ratings) {{$course->numOfStudents()}} students enrolled</small><br>
            <small>Created by: {{$course->user->name}}, Last updated: 4/2020</small><br>
            @if(Auth::check())
                @if(auth()->user()->id === $course->mentor_id)
                    <a href="#" class="btn btn-outline-warning">Edit Your Course</a>
                @endif
            @endif
        </div>
        <div class="introduction-video">
            <div class="video-box">
                <img src="{{($course->getFirstMediaUrl()) ? $course->getFirstMediaUrl() : asset('images/course-image.jpg')}}" alt="">
                <h3 class="price">$18.99</h3>
                <button class="buy-now" type="submit">Buy Now</button>
                <div class="course-includes">
                    <small><i class="fas fa-download"></i> Downloadable resources</small>
                    <small><i class="fas fa-heartbeat"></i> Full lifetime access</small>
                    <small><i class="fas fa-mobile"></i> Access on mobile and TV</small>
                    <small><i class="fas fa-certificate"></i> Certificate of Completion</small>
                </div>
            </div>
        </div>
    </div>
    <div class="course-description mt-3">
        <h3 class="mb-4">What will you learn in this course</h3>
        <div class="description">
            <?php echo $course->description ?>
        </div>
    </div>
    <div class="reviews">
        Reviews
    </div>
@endsection
