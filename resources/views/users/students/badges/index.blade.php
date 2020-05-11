@extends('layouts.dashboard_layout')

@section('content')
    <div class="content-wrapper">
        @foreach($user->badges as $badge)
            {{$badge->name}} <br>
        @endforeach
    </div>
@endsection
