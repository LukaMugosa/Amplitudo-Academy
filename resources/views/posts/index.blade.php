@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/blog_style.css')}}">
@endsection

@section('content')
    <div class="blog-heading">
        <div class="title">
            <h2>Our Blog</h2>
        </div>
    </div>
    <div class="posts">
        @foreach($posts as $post)
            <div class="post">
                    <img class="post-picture" src="{{($post->getFirstMediaUrl()) ? $post->getFirstMediaUrl() : asset('images/blog_post_image.jpg') }}" alt="">
                    <div class="text-content">
                        <h3 class="post-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <p class="post-description">{{$post->description}}</p>
                        <small class="user">Written on {{$post->created_at}} By:{{$post->user->name}}</small>
                    </div>
            </div>
        @endforeach
    </div>
@endsection
