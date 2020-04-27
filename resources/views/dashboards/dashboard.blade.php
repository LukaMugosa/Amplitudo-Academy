@extends('layouts.dashboard_layout')

@section('content')
    @if(Auth::user()->isAdmin())
        @include('layouts.dashboards.admin_dashboard')
    @elseif(Auth::user()->isMentor())
        @include('layouts.dashboards.mentor_dashboard')
    @elseif(Auth::user()->isStudent())
        @include('layouts.dashboards.student_dashboard')
    @elseif(Auth::user()->isSupervisor())
        @include('layouts.dashboards.supervisor_dashboard')
    @elseif(Auth::user()->isGuest())
        @include('layouts.dashboards.guest_dashboard')
    @endif
@endsection
