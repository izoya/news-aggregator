@extends('layouts.main')

@section('content')
{{-- Title --}}
<x-title title="Welcome to the awesome news!"></x-title>
{{-- Content --}}
<div class="row">
    {{-- Photo & buttons --}}
    <div class="col-12 col-sm-2 col-md-3 d-flex flex-row flex-sm-column align-items-center mb-5">
        <img src="{{ asset('images/author.png') }}" alt="Zoya Ivanova" class="photo mb-sm-5">
        <div class="d-flex flex-column  ml-5 ml-sm-0">
        <a href="https://github.com/izoya/laravel-course" class="btn btn-common btn-xs mr-3 w-100">
            Explore at Github</a>
        <a href="mailto:ivanova.zoya.r@gmail.com" class="btn btn-raised btn-success btn-xs w-100">
            <strong>Contact me</strong></a>
        </div>
    </div>
    {{-- About project --}}
    <div class="col-12 col-sm-8 col-md-8 ml-sm-3 ml-md-5">
        <div>
            <p>Greetings!</p>
            <p>I'm Zoya, the developer of this news aggregator website.
               I've created it for study and portfolio purposes.
            </p>
            <h6><strong>Here's a technology stack and some key features of the project:</strong></h6>
            <div class="pl-4 my-3" id="features">
                <div class="d-flex align-content-center">
                    <i class="mdi mdi-buffer"></i>
                    <p>Laravel 8 + MySQL + JavaScript + Bootstrap</p>
                </div>
                <div class="d-flex align-content-center">
                    <i class="mdi mdi-folder-multiple-image"></i>
                    <p>Admin panel with HTML-editor and file manager</p>
                </div>
                <div class="d-flex align-content-center">
                    <i class="mdi mdi-account-multiple-check"></i>
                    <p>Facebook & Vkontakte authentication using Laravel Socialite</p>
                </div>
                <div class="d-flex align-content-center">
                    <i class="mdi mdi-rss-box"></i>
                    <p>News content is being collected via rss-feed parsing</p>
                </div>
                <div class="d-flex align-content-center">
                    <i class="mdi mdi-fast-forward"></i>
                    <p>Parsing jobs are queued through Redis</p>
                </div>
            </div>
            <h6><strong>Try on admin features</strong></h6>
            <p><a href="{{ route('login') }}">Login</a> with admin@admin.com
                and password '123' to get access to the
                <a href="{{ route('admin.dashboard') }}">Admin panel</a>.</p>
        </div>
    </div>
</div>
@endsection
