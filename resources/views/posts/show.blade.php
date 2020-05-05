@extends('layouts.app')
@section('links')
    <link rel="stylesheet" href="{{asset('css/post_style.css')}}">
@endsection

@section('content')
    <div class="main-container">
        <div class="heading">
            <img class="image" src="{{asset('images/blog_post_image.jpg')}}" alt="blog_post_image.jpg">
        </div>
        <div class="content">
            <h2>{{$post->title}}</h2>
            <small>By: {{$post->user->name}} | Created at: {{$post->created_at}}</small>
            <p>{{$post->body}}</p>
        </div>
        <div class="comments">
            <h3>Comments:</h3>
            @foreach($post->comments as $comment)
               <div class="comment-container">
                   <div class="profile-picture">
                       <img id="profile-pic" src="{{asset('images/profile-image.jpg')}}" alt="">
                   </div>
                   <div class="comment-content">
                       <p>{{$comment->body}}</p>
                   </div>
               </div>
            @endforeach
        </div>
    </div>
@endsection
{{--<a class="btn btn-dark" href="{{url('/posts')}}">Go Back</a>--}}
{{--<h1>{{$post->title}}</h1>--}}
{{--<h4>{{$post->description}}</h4>--}}
{{--<p>{{$post->body}}</p>--}}
{{--<hr>--}}
{{--<small>Written on {{$post->created_at}}</small>--}}
