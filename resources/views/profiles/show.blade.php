@extends('layouts.dashboard_layout')


@section('links')
    <style>
        .hide{
            display: none;
        }
    </style>
@endsection

@section('content')
{{--    Treba osmisliti da ako korisnik kojeg trazimo nema profil izbacimo grsku--}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                        @if(auth()->user()->isAdmin())
                            @if($profile->user->isMentor() || $profile->user->isSupervisor())
                                <a href="/{{strtolower(substr($profile->user->role->name,5))}}s/edit/{{$profile->user->id}}" class="btn btn-success mt-0">Edit User</a>
                            @endif
                            {!! Form::open(['action' => ['UsersController@destroy',$profile->user->id],'method' => 'POST' , 'class' => 'mt-0' , 'style' => 'display:inline-block;']) !!}
                                {{Form::hidden('_method','DELETE')}}
                                {{ Form::submit('Delete User', ['class' => 'btn btn-danger']) }}
                            {!! Form::close() !!}
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('http://127.0.0.1:8000/')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="../../dist/img/user4-128x128.jpg"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{$profile->user->name}}</h3>

                                <p class="text-muted text-center">{{substr($profile->user->role->name,5)}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    @if($profile->user->isStudent())
                                        <li class="list-group-item">
                                            <b>Enrollments</b> <a class="float-right">{{count($profile->user->courses)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Badges</b> <a class="float-right">{{count($profile->user->badges)}}</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>XP</b><a class="float-right">{{15*$doneHomework}} points</a>
                                        </li>
                                    @endif
                                    @if($profile->user->isMentor())
                                        <span class="bg-gradient-warning rounded p-2 text-bold">Experience</span> <br>
                                        <li class="list-group-item">{{$profile->experience}}</li>
                                    @endif
                                </ul>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>
                                <p class="text-muted">
                                  {{$profile->education}}
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">{{$profile->address}}</p>

                                <hr>

                                <strong><i class="fas fa-align-left"></i> Description</strong>

                                <p class="text-muted">{{$profile->description}}</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">{{$profile->skills}}</span>
                                </p>

                                <hr>

                                <strong><i class="fas fa-id-card"></i> Contact</strong>

                                <p class="text-muted">{{$profile->user->email}}</p>
                                <p class="text-muted">{{$profile->phone_number}}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Social Media </a></li>
                                    @if($profile->user->isStudent())
                                        <li class="nav-item"><a class="nav-link" href="#homework" data-toggle="tab">Homework</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#projects" data-toggle="tab">Projects</a></li>
                                    @endif
                                    @if(auth()->user()->id === $profile->id)
                                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                    @endif
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="modal fade" id="modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add New Post</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body-2">
                                            {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                            <div class="card-body">
                                                <div class="form-group">
                                                    {{Form::label('title', 'Title')}}
                                                    {{Form::text('title', '', ['class' => 'form-control ', 'placeholder' => 'Enter Full Title Name','id' => 'exampleInputName'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('post_header_picture', 'Upload header image')}} <br>
                                                    {{Form::file('post_header_picture')}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('descriptionInput', 'Description')}}
                                                    {{Form::textarea('description', '', ['class' => 'form-control', 'id' => 'descriptionInput', 'placeholder' => 'Enter some description'])}}
                                                </div>
                                                <div class="card-body pad">
                                                    <div class="mb-3">
                                                        {{Form::label('body','Post Content')}}
                                                        {{Form::textarea('body', '', ['class' => 'textarea form-control', 'placeholder' => 'Place some text here', 'style' => 'width: 120%; height: 800px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'])}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.card -->
                            <div class="card-body">
                                <div class="tab-content">

                                    <div class="active tab-pane" id="timeline">
                                        @if(auth()->user()->id === $profile->id)
                                            <div class="timeline">
                                                <button type="button" class="btn btn-default bg-gradient-teal" data-toggle="modal" data-target="#modal-lg">Add New Post</button>
                                            </div>
                                        @endif
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
                                        @if(session()->has('success2'))
                                            <div class="alert alert-success w-50" id="success2">
                                                {{ session()->get('success2') }}
                                                <script>
                                                    const success2 = document.getElementById("success2");
                                                    setTimeout(() => {
                                                        success2.classList.add('hide');
                                                    },3000);
                                                </script>
                                            </div>
                                        @endif

                                        <div class="posts">
                                            @foreach($posts as $post)
                                                <div class="timeline-item timeline-inverse mb-3 card p-5 bg-gradient-teal">
                                                    <span class="badge badge-pill badge-light w-25 mb-2 p-2 text-md-left"><i class="far fa-clock"></i>{{$post->created_at}}</span>
                                                    <h3 class="timeline-header">{{$post->title}}</h3>
                                                    <div class="timeline-body mb-3">{{$post->description}}</div>
                                                    <div class="timeline-footer">
                                                        <a href="{{url("/posts/$post->id")}}" class="btn btn-primary">Read more</a>
                                                        @if(auth()->user()->id === $post->user_id)
                                                            {!! Form::open(['action' => ['PostsController@destroy',$post->id],'method' => 'POST' , 'class' => 'mt-0' , 'style' => 'display:inline-block;']) !!}
                                                            {{Form::hidden('_method','DELETE')}}
                                                            {{ Form::button('Delete <i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] )  }}
                                                            {!! Form::close() !!}
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="activity">
                                        <div class="container w-100 justify-content-around">
                                            <a href="{{$profile->github_profile_link}}"><i class="fab fa-github w-25 h-50" style="font-size: 50px"></i></a>
                                            <a href="{{$profile->instagram_profile_link}}"><i class="fab fa-instagram w-25 h-50" style="font-size: 50px"></i></a>
                                            <a href="{{$profile->linkedin_profile_link}}"><i class="fab fa-linkedin-in w-25 h-50" style="font-size: 50px"></i></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="homework">
                                        <div>
                                            @if(auth()->user()->isMentor())
                                                <button class="btn btn-success"><i class="fas fa-certificate"></i> Add Badge</button>
                                            @endif
                                            <br>
                                            @if(count($showHomeworks) < 1)
                                                <p>The user doesn't have any done projects yet!</p>
                                            @endif
                                            @foreach($showHomeworks as $homework)
                                                    <div class="timeline-item timeline-inverse mb-3 card p-5 bg-info">
                                                        <span class="badge badge-pill badge-light w-25 mb-2 p-2 text-md-left"><i class="far fa-clock"></i>{{$homework->created_at}}</span>
                                                        <h3 class="timeline-header">{{$homework->title}}</h3>
                                                        <a href="{{url("/download-homework/".$homework->users[0]->pivot->file_name)}}" class="btn btn-dark" style="width: 300px">Download Students Homework</a>
                                                        @if(auth()->user()->isMentor())
                                                            <a href="#" class="btn btn-outline-warning mt-3" style="width: 300px">Evaluate Homework</a>
                                                        @endif
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="projects">
                                        <div>
                                            @if(count($showProjects) < 1)
                                                <p>The user doesn't have any done projects yet!</p>
                                            @endif
                                            @foreach($showProjects as $project)
                                                <div class="timeline-item timeline-inverse mb-3 card p-5 bg-info">
                                                    <span class="badge badge-pill badge-light w-25 mb-2 p-2 text-md-left"><i class="far fa-clock"></i>{{$project->created_at}}</span>
                                                    <h3 class="timeline-header">{{$project->title}}</h3>
                                                    <a href="{{url("/download-project/".$project->users[0]->pivot->file_name)}}" class="btn btn-dark" style="width: 300px">Download Students Project</a>
                                                    @if(auth()->user()->isMentor())
                                                        <a href="#" class="btn btn-outline-warning mt-3" style="width: 300px">Evaluate Homework</a>
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    @if(auth()->user()->id === $profile->id)
                                        <div class="tab-pane" id="settings">
                                            {!! Form::open(['action' => ['ProfilesController@update',$profile->id], 'class' => 'form-horizontal', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                <div class="form-group row">
                                                    {{Form::label('name', 'Full Name', ['class' => "col-sm-2 col-form-label"])}}
                                                    <div class="col-sm-10">
                                                        {{Form::text('name', $profile->user->name, ['class' => 'form-control ', 'placeholder' => 'Enter Full Name'])}}
                                                        @error('name')
                                                            <div class="alert alert-danger" id="error_1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {{Form::label('description_2', 'Description', ['class' => "col-sm-2 col-form-label"])}}
                                                    <div class="col-sm-10">
                                                        {{Form::textarea('description_2', $profile->description, ['class' => 'form-control ', 'placeholder' => 'Enter some stuff about you..'])}}
                                                        @error('description_2')
                                                            <div class="alert alert-danger" id="error_2">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {{Form::label('education', 'Education', ['class' => "col-sm-2 col-form-label"])}}
                                                    <div class="col-sm-10">
                                                        {{Form::textarea('education', $profile->education, ['class' => 'form-control ', 'placeholder' => 'Enter information about your education'])}}
                                                        @error('education')
                                                            <div class="alert alert-danger" id="error_3">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                @if($profile->user->isMentor())
                                                    <div class="form-group row">
                                                        {{Form::label('experience', 'Experience', ['class' => "col-sm-2 col-form-label"])}}
                                                        <div class="col-sm-10">
                                                            {{Form::textarea('experience', $profile->experience, ['class' => 'form-control ', 'placeholder' => 'Enter experience'])}}
                                                            @error('experience')
                                                                <div class="alert alert-danger" id="error_4">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="form-group row">
                                                    {{Form::label('address', 'Address', ['class' => "col-sm-2 col-form-label"])}}
                                                    <div class="col-sm-10">
                                                        {{Form::text('address', $profile->address, ['class' => 'form-control ', 'placeholder' => 'Enter Address'])}}
                                                        @error('address')
                                                            <div class="alert alert-danger" id="error_5">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {{Form::label('phone_number', 'Phone number', ['class' => "col-sm-2 col-form-label"])}}
                                                    <div class="col-sm-10">
                                                        {{Form::text('phone_number', $profile->phone_number, ['class' => 'form-control ', 'placeholder' => '+382xxxx69'])}}
                                                        @error('phone_number')
                                                            <div class="alert alert-danger" id="error_6">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {{Form::label('skills', 'Skills', ['class' => "col-sm-2 col-form-label"])}}
                                                    <div class="col-sm-10">
                                                        {{Form::text('skills', $profile->skills, ['class' => 'form-control ', 'placeholder' => 'Enter skills'])}}
                                                        @error('skills')
                                                            <div class="alert alert-danger" id="error_7">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
                                                    </div>
                                                </div>
                                            {!! Form::close() !!}

                                        </div>
                                    <!-- /.tab-pane -->
                                    @endif
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('additional-scripts')
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
    <script>
        const error_1 = document.getElementById('error_1');
        const error_2 = document.getElementById('error_2');
        const error_3 = document.getElementById('error_3');
        const error_4 = document.getElementById('error_4');
        const error_5 = document.getElementById('error_5');
        const error_6 = document.getElementById('error_6');
        const error_7 = document.getElementById('error_7');
        setTimeout(() => {
            if(error_1)
                error_1.classList.add('hide');
            if(error_2)
                error_2.classList.add('hide');
            if(error_3)
                error_3.classList.add('hide');
            if(error_4)
                error_4.classList.add('hide');
            if(error_5)
                error_5.classList.add('hide');
            if(error_6)
                error_6.classList.add('hide');
            if(error_7)
                error_7.classList.add('hide');
        },5000);
    </script>
@endsection
