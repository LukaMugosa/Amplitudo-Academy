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
        <div class="card">
            <a href=""><img src="{{asset("images/course-image.jpg")}}" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <a href=""><img src="{{asset("images/course-image.jpg")}}" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <a href=""><img src="{{asset("images/course-image.jpg")}}" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <a href=""><img src="{{asset("images/course-image.jpg")}}" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card">
            <a href=""><img src="{{asset("images/course-image.jpg")}}" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div><div class="card">
            <a href=""><img src="{{asset("images/course-image.jpg")}}" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div><div class="card">
            <a href=""><img src="{{asset("images/course-image.jpg")}}" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div><div class="card">
            <a href=""><img src="{{asset("images/course-image.jpg")}}" class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

@endsection
