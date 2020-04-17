@extends('layouts.app')

@section('content')
    @if(count($posts) > 0)
        <div class="card">
            <ul class="list-group list-group-flush">
                @foreach($posts as $post)
                    <div class="row">
                        <div class="col-md-8">
                            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                            <small>Written on {{$post->created_at}} By:{{$post->user->name}}</small>
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
