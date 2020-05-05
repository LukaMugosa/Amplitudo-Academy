@extends('layouts.dashboard_layout')

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
                            <a href="/{{strtolower(substr($profile->user->role->name,5))}}s/edit/{{$profile->user->id}}" class="btn btn-success mt-0">Edit User</a>
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
                                            <b>Badges</b> <a class="float-right">0</a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>XP</b> <a class="float-right">0 points</a>
                                        </li>
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
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">{{$profile->address}}</p>

                                <hr>

                                <hr>

                                <strong><i class="fas fa-align-left"></i> Description</strong>

                                <p class="text-muted">{{$profile->description}}</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">UI Design</span>
                                    <span class="tag tag-success">Coding</span>
                                    <span class="tag tag-info">Javascript</span>
                                    <span class="tag tag-warning">PHP</span>
                                    <span class="tag tag-primary">Node.js</span>
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

                                        <div class="timeline">
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">Add New Post</button>
                                        </div>
                                        <div class="posts">
                                            @foreach($posts as $post)
                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> {{$post->created_at}}</span>
                                                    <h3 class="timeline-header">{{$post->title}}</h3>
                                                    <div class="timeline-body mb-3">{{$post->description}}</div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
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
                                    @if(auth()->user()->id === $profile->id)
                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
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
