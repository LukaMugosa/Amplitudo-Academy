@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/course_style.css')}}">
    <style>

        .hide{
            display: none;
        }
        #number{
            float: right;
            position: absolute;
            width: 100px;
            height: 50px;
            border: 2px solid #121a24;
            font-size: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="background-container">
        <div class="course-content">
            <h2>{{$course->title}}</h2>
            <h4>{{$course->about_course}}</h4>
            @error('credit_card_number')
                <div class="alert alert-danger" id="error1">{{$message}}</div>
            @enderror
            @error('name')
                <div class="alert alert-danger" id="error2">{{$message}}</div>
            @enderror
            @error('expires')
                <div class="alert alert-danger" id="error3">{{$message}}</div>
            @enderror
            @error('cvc')
                <div class="alert alert-danger" id="error4">{{$message}}</div>
            @enderror
            <small>Rating: {{substr($course->avgRating(),0,strlen($course->avgRating())-2)}} ({{$course->numOfRatings()}} ratings) {{$course->numOfStudents()}} students enrolled</small><br>
            <small>Created by: {{$course->user->name}}, Last updated: 4/2020</small><br>
            @if(Auth::check())
                @if(auth()->user()->id === $course->mentor_id)
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target-id="{{$course->id}}" data-target="#modal-default-3"><i class="fas fa-edit"></i></button>
                    <div class="modal fade" id="modal-default-3" tabindex="-2" role="dialog" aria-labelledby="myModalLabel2">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-info">Edit Course</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body-3"></div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
        <div class="introduction-video">
            <div class="video-box">
                <img src="{{($course->getFirstMediaUrl()) ? $course->getFirstMediaUrl() : asset('images/course-image.jpg')}}" alt="">
                <h3 class="price">{{$course->price}} &euro;</h3>
                @if(Auth::check())
                    @if(auth()->user()->isStudent() && !(auth()->user()->hasThisCourse($course->id)))
                        <button class="buy-now" type="submit" data-toggle="modal" data-target="#modal-lg">Buy Now</button>
                        <div class="modal fade" id="modal-lg">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Assignment</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body-2">
                                        {!! Form::open(['action' => 'PaymentsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                        <div class="card-body">
                                            <div class="form-group">
                                                {{Form::label('credit_card_number', 'Credit Card Number')}}
                                                {{Form::text('credit_card_number', '', ['class' => 'form-control ', 'placeholder' => '4570 4570 4570 4570'])}}

                                            </div>
                                            <div class="form-group">
                                                {{Form::label('name', 'Name On Credit Card')}}
                                                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'John Smith'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('expires', 'Expires')}}
                                                {{Form::text('expires', '', ['class' => 'form-control', 'placeholder' => '10/2021'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('cvc', 'CVV')}}
                                                {{Form::number('cvc')}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::number('amount',"$course->price",['hidden'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::number('course_id',"$course->id",['hidden'])}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        {{Form::submit("Pay $course->price &euro;",['class' => 'btn btn-success w-50'])}}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    @else
                        <span>You can not purchase this product</span>
                    @endif
                @endif
                @guest()
                    <a href="{{url('/login')}}" class="buy-now">Buy Now</a>
                @endguest
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
    <div class="comments" id="comments">
        <h3>Reviews:</h3>
        @if(Auth::check())
            {!! Form::open(['action' => 'RatingsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="add-comment">
                <div class="add-comment-input">
                    {{Form::text('comment', '', ['class' => 'input-field', 'placeholder' => 'Feel free to leave your rating..'])}}
                    {{Form::number('rating_value', '', ['id' => 'number','min' => 0,'max' => 5])}}
                </div>
                {{Form::number('course_id',$course->id,['hidden'])}}
                {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}
        @endif
        @error('comment')
        <div class="alert alert-danger" id="comment-error" role="alert">{{$message}}</div>
        @enderror
        <script>
            const commentError = document.getElementById('comment-error');
            setTimeout(() => {
                if(commentError)
                    commentError.classList.add('hide');
            },3500);
        </script>
        @foreach($reviews as $review)
            <span class="badge badge-pill badge-light ml-4 mb-2 p-2 text-md-left" style="width: 150px"><i class="far fa-clock"></i> {{$review->created_at}}</span>
            <div class="comment-container">
                <div class="profile-picture">
                    <img id="profile-pic" src="{{asset('images/profile-image.jpg')}}" alt="">
                </div>
                <div class="comment-content">
                    @if(Auth::check())
                        <a href="{{url("/profile/{$review->user_id}")}}"><h5 class="mb-0 p-2 text-sm">{{$review->user->name}}</h5></a>
                    @endif
                    @guest()
                        <h5 class="mb-0 p-2 text-sm">{{$review->user->name}}</h5>
                    @endguest
                    <p>{{$review->comment}}</p>
                    @if(Auth::check())
                        @if(auth()->user()->id === $review->user_id)
                            {!! Form::open(['action' => ['RatingsController@destroy',$review->id],'method' => 'POST' , 'class' => 'mt-0' , 'style' => 'display:inline-block;']) !!}
                            {{Form::hidden('_method','DELETE')}}
                            {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm mr-3 p-0', 'style' => 'width:40px;height:40px',] )  }}
                        @endif
                    @endif
                </div>

            </div>
        @endforeach
    </div>
    <script>
        const error1 = document.getElementById('error1');
        const error2 = document.getElementById('error2');
        const error3 = document.getElementById('error3');
        const error4 = document.getElementById('error4');

        setTimeout(() => {
            if(error1)
                error1.classList.add('hide');
            if(error2)
                error2.classList.add('hide');
            if(error3)
                error3.classList.add('hide');
            if(error4)
                error4.classList.add('hide');
        },3000);
    </script>
    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#modal-default-3").on("show.bs.modal", function(e) {
                console.log(1);
                var id = $(e.relatedTarget).data('target-id');
                $.get("/courses/edit/" + id, function(data) {
                    $(".modal-body-3").html(data.html);
                });
            });
        });
    </script>
@endsection

