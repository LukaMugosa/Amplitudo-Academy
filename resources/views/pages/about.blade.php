@extends('layouts.app')

@section('links')
    <link rel="stylesheet" href="{{asset("css/about_style.css")}}">
@endsection

@section('content')
    <section class="package" id="plus">
        <a href="#">
            <h1 class="package__title">Who are we?</h1>
            <h2 class="package__subtitle">Leading digital innovator in Montenegro.</h2>
            <p class="package__info">We are a company with an extensive track record in software development, implementation of ICT and IoT solutions, digital marketing and online promotion.</p>
        </a>
    </section>
    <section class="package" id="free">
        <a href="#">
            <h1 class="package__title">Our History</h1>
            <h2 class="package__subtitle">Founded in the twelfth year of the new millennium</h2>
            <p class="package__info">We started with simple process automation solutions that in 7 years lead to creation of over 50 android and iOS applications, over 100 websites, 30 complex software solutions, and 2019. we are finishing with creation of the first Montenegrin hardware.</p>
        </a>
    </section>
    <div class="clearfix"></div>
    <section class="package" id="premium">
        <a href="#">
            <h1 class="package__title">Our Goal</h1>
            <h2 class="package__subtitle">Creating and motivating new developers every day</h2>
            <p class="package__info">The goal is to prevent the departure of young and ambitious people from Montenegro and support to gain new knowledge and skills in the area you are trained.</p>
        </a>
    </section>
@endsection
