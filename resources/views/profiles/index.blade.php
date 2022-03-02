@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-3 col-lg-5 p-5 text-center">
            <img src="/images/userProfile.jpg" class="rounded-circle" width="200px" height="200px" alt="user profile image here">
        </div>

        <div class="col-sm-12 col-md-9 col-lg-7 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{ $user->username }}</h1>
                <a class="btn btn-outline-primary" href="/p/create">Add New Post</a>
            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            
            <div class="d-flex">
                <div class="pe-5"><b>{{ $user->posts->count() }}</b> Posts</div>
                <div class="pe-5"><b>150</b> Followers</div>
                <div class="p4-5"><b>150</b> Following</div>
            </div>
            <div class="pt-4"><b>{{ $user->profile->title ?? 'Your profile title...' }}</b></div>
            <div>{{ $user->profile->description ?? 'Your profile description...' }}</div>
            <div class="font-weight-bold"><b><a style="text-decoration: none" class="link-secondary" href="#">{{ $user->profile->url ?? 'N/A' }}</a></b></div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-sm-12 col-md-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100 h-100 pb-3">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection