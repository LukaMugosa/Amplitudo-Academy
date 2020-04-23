@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset('css/profile_style.css')}}">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
@endsection
@section('dashboard_menu')
    <a class="dropdown-item" href="/profile/{{auth()->user()->id}}">My Profile</a>
    <a class="dropdown-item" href="#">Payments</a>
    <a class="dropdown-item" href="#">Add Mentor</a>
    <a class="dropdown-item" href="#">Add Supervisor</a>
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
                <td colspan="4">Lorem ipsum dolor sit amet.</td>
            </tr>
            <tr>
                <th colspan="4" scope="row">Email <i class="far fa-envelope-open"></i></th>
                <td colspan="4">fakeemail@test.com</td>
            </tr>
            <tr>
                <th colspan="4" scope="row">Phone number <i class="fas fa-mobile-alt"></i></th>
                <td colspan="4">+38269842993</td>
            </tr>
            </tbody>
        </table>
        <div class="description">
            <h5>About Me</h5>
            <p class="description-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, debitis delectus, et fugit harum incidunt nobis quam quo quos saepe tempora veniam. Aliquam dignissimos laboriosam repellat sapiente sunt voluptates. Accusantium, adipisci architecto asperiores distinctio dolorem eligendi enim eos est eveniet illum impedit inventore itaque molestias nemo non possimus quae quam quia quibusdam quidem quos, repellat repellendus similique voluptates voluptatibus? Recusandae.</p>
        </div>
        <div class="social-media">
            <h5>Social Media:</h5>
            <div class="links">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>

</div>
@endsection
