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
            <img class="image" src="{{($post->getFirstMediaUrl()) ?  $post->getFirstMediaUrl() : asset('images/blog_post_image.jpg')}}" alt="blog_post_image.jpg">
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
        <div class="comments" id="comments">
            <h3>Comments:</h3>
            @if(Auth::check())
                {!! Form::open(['action' => 'CommentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="add-comment">
                    <div class="add-comment-input">
                        {{Form::text('body', '', ['class' => 'input-field', 'placeholder' => 'Feel free to leave your comment..'])}}
                    </div>
                    {{Form::number('post_id',$post->id,['hidden'])}}
                    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                </div>
                {!! Form::close() !!}
            @endif
            @error('body')
                <div class="alert alert-danger" id="comment-error" role="alert">{{$message}}</div>
            @enderror
            <script>
                const commentError = document.getElementById('comment-error');
                setTimeout(() => {
                    if(commentError)
                        commentError.classList.add('hide');
                },3500);
            </script>
            @foreach($post->comments->sortByDesc('updated_at') as $comment)
                <span class="badge badge-pill badge-light ml-4 mb-2 p-2 text-md-left" style="width: 150px"><i class="far fa-clock"></i> {{$comment->created_at}}</span>
                <div class="comment-container">
                   <div class="profile-picture">
                       <img id="profile-pic" src="{{asset('images/profile-image.jpg')}}" alt="">
                   </div>
                   <div class="comment-content">
                       @if(Auth::check())
                            <a href="{{url("/profile/{$comment->user->id}")}}"><h5 class="mb-0 p-2 text-sm">{{$comment->user->name}}</h5></a>
                       @endif
                       @guest()
                               <h5 class="mb-0 p-2 text-sm">{{$comment->user->name}}</h5>
                       @endguest
                       <p>{{$comment->body}}</p>
                           @if(Auth::check())
                               @if(auth()->user()->id === $comment->user->id)
                                   {!! Form::open(['action' => ['CommentsController@destroy',$comment->id],'method' => 'POST' , 'class' => 'mt-0' , 'style' => 'display:inline-block;']) !!}
                                   {{Form::hidden('_method','DELETE')}}
                                   {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm mr-3 p-0', 'style' => 'width:40px;height:40px',] )  }}
                               @endif
                           @endif
                   </div>

               </div>
            @endforeach
        </div>
    </div>

@endsection

