@extends('layouts.app')
@section('links')
    <link rel="stylesheet" href="{{asset('css/post_style.css')}}">
    <style>
        .pozicioniraj{
            right: 5%;
        }
        .hide{
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="main-container">
        <div class="heading">
            <img class="image" src="{{asset('images/blog_post_image.jpg')}}" alt="blog_post_image.jpg">
        </div>
        <div class="content">
            <h2>{{$post->title}}</h2>
            @if(Auth::check())
                @if(auth()->user()->id === $post->user_id)
                    <button type="button" class="btn btn-outline-warning w-25 position-absolute pozicioniraj" data-toggle="modal" data-target-id="{{$post->id}}" data-target="#myModal">Edit Your Post</button>
                    @error('title')
                    <div class="alert alert-danger w-50" id="error1" role="alert">{{$message}}</div>
                    @enderror
                    @error('description')
                    <div class="alert alert-danger w-75" id="error2" role="alert">{{$message}}</div>
                    @enderror
                    @error('body')
                    <div class="alert alert-danger w-75" id="error3" role="alert">{{$message}}</div>
                    @enderror
                    @if(session()->has('success'))
                        <div class="alert alert-success w-50" id="success">
                            {{ session()->get('success') }}
                            <script>
                                const success = document.getElementById("success");
                                setTimeout(() => {
                                    success.classList.add('hide');
                                },3000);
                            </script>
                        </div>
                    @endif
                    <div class="modal fade" id="myModal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-info">Edit post</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body-2"></div>
                            </div>
                        </div>
                    </div>
                    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
                    <!-- jQuery UI 1.11.4 -->
                    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
                    <script>
                        $(document).ready(function(){
                            $("#myModal").on("show.bs.modal", function(e) {
                                var id = $(e.relatedTarget).data('target-id');
                                $.get( "/posts/edit/" + id, function(data) {
                                    $(".modal-body-2").html(data.html);
                                });
                            });
                        });
                    </script>
                    <script>
                        const error1 = document.getElementById('error1');
                        const error2 = document.getElementById('error2');
                        const error3 = document.getElementById('error3');
                        setTimeout(() => {
                            if(error1)
                                error1.classList.add('hide');
                            if(error2)
                                error2.classList.add('hide');
                            if(error3)
                                error3.classList.add('hide');
                        },3500);
                    </script>
                @endif
            @endif
            <small>By: {{$post->user->name}} | Created at: {{$post->created_at}}</small>
            <p><?php echo $post->body ?></p>
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

