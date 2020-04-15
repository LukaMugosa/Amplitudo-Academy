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
        <div class="post">
            <img src="{{asset('images/blog_post_image.jpg')}}" alt="">
            <div class="text-content">
                <h3 class="post-title">Title</h3>
                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, ratione! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur expedita, voluptates. Assumenda at eaque hic illum quisquam recusandae voluptatibus! Voluptatum.</p>
                <small class="user">By:Luka Mugosa | Created at: 15.4.2020 | Updated at:15.4.2020</small>
            </div>
        </div>
        <div class="post" >
            <img src="{{asset('images/blog_post_image.jpg')}}" alt="">
            <div class="text-content" id="second">
                <h3 class="post-title">Title</h3>
                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, ratione! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur expedita, voluptates. Assumenda at eaque hic illum quisquam recusandae voluptatibus! Voluptatum.</p>
                <small class="user">By:Luka Mugosa | Created at: 15.4.2020 | Updated at:15.4.2020</small>
            </div>
        </div>
        <div class="post" >
            <img src="{{asset('images/blog_post_image.jpg')}}" alt="">
            <div class="text-content" id="third">
                <h3 class="post-title">Title</h3>
                <p class="post-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, ratione! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur expedita, voluptates. Assumenda at eaque hic illum quisquam recusandae voluptatibus! Voluptatum.</p>
                <small class="user">By:Luka Mugosa | Created at: 15.4.2020 | Updated at:15.4.2020</small>
            </div>
        </div>
    </div>
@endsection
