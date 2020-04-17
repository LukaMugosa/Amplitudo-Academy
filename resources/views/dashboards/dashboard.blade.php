@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(Auth::user()->isAdmin())
                            <p>You are logged in as Admin!</p>
                        @elseif(Auth::user()->isMentor())
                                <p>You are logged in as Mentor!</p>
                        @elseif(Auth::user()->isStudent())
                            <p>You are logged in as Student!</p>
                        @elseif(Auth::user()->isSupervisor())
                            <p>You are logged in as Supervisor!</p>
                        @elseif(Auth::user()->isGuest())
                            <p>You are logged in as Guest!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
