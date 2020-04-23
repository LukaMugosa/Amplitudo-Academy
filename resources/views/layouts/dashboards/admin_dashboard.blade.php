@extends('layouts.app')



@section('dashboard_menu')
    <a class="dropdown-item" href="/profile/{{auth()->user()->id}}">My Profile</a>
    <a class="dropdown-item" href="#">Payments</a>
    <a class="dropdown-item" href="#">Add Mentor</a>
    <a class="dropdown-item" href="#">Add Supervisor</a>
@endsection

@section('content')
    @include('users.index')
@endsection
