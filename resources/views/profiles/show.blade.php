@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/profile_style.css')}}">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
@endsection

@section('content')
<div class="heading">
    <h2>Your Profile</h2>
</div>
<div class="profile-container">
    <div class="profile-pic">
        <img src="{{asset('images/profile-image.jpg')}}" alt="">
        <button class="btn btn-light w-100 mt-3" type="submit">Edit Profile</button>
    </div>
    <div class="user-informations">
        <table class="table">
            <thead class="custom">
            <tr>
                <th id="info" colspan="8" scope="col">User Information</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th colspan="4" scope="row">Name</th>
                <td colspan="4">{{$profile->user->name}}</td>
            </tr>
            <tr>
                <th colspan="4" scope="row">Address <i class="far fa-address-card"></i></th>
                <td colspan="4">{{$profile->address}}</td>
            </tr>
            <tr>
                <th colspan="4" scope="row">Email <i class="far fa-envelope-open"></i></th>
                <td colspan="4">{{$profile->user->email}}</td>
            </tr>
            <tr>
                <th colspan="4" scope="row">Phone number <i class="fas fa-mobile-alt"></i></th>
                <td colspan="4">{{$profile->phone_number}}</td>
            </tr>
            </tbody>
        </table>
        <div class="description">
            <h5>About Me</h5>
            <p class="description-content">{{$profile->description}}</p>
        </div>
        <div class="social-media">
            <h5>Social Media:</h5>
            <div class="links">
                <a href="{{$profile->instagram_profile_link}}"><i class="fab fa-instagram"></i></a>
                <a href="{{$profile->github_profile_link}}"><i class="fab fa-github"></i></a>
                <a href="{{$profile->linkedin_profile_link}}"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>

</div>
@endsection
