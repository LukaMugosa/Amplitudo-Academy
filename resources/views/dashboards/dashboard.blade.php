@extends('layouts.app')

@section('content')
    @if(Auth::user()->isAdmin())
       <div class="dashboard-admin">
            Admin
       </div>
    @elseif(Auth::user()->isMentor())
        <div class="dashboard-mentor">
            Mentor
        </div>
    @elseif(Auth::user()->isStudent())
        <div class="dashboard-student">
            Student
        </div>
    @elseif(Auth::user()->isSupervisor())
        <div class="dashboard-supervisor">
            Supervisor
        </div>
    @elseif(Auth::user()->isGuest())
        <div class="dashboard-guest">
            guest
        </div>
    @endif
@endsection
