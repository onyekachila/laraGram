@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ asset('img/sideLogo.jpg') }}" alt="">
        </div>
        <div class="col-9 pt-5  ">
            <div><h1>laraGram</h1></div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> Posts</div>
                <div class="pr-5"><strong>233k</strong> Followers</div>
                <div class="pr-5"><strong>212</strong> Following</div>
            </div>
            <div class="pt-4 font-weight-bold">
                <div class="d-flex justify-content-between align-items-baseline">
                <h3>{{$user->username}}</h3>
                <a href="/p/create">Add New Post</a>
            </div>
            </div>
            <div>
                {{ $user->profile->title }}
            </div>
            <div>
                {{ $user->profile->description }}
            </div>
            <div>
                <a href="#">{{ $user->profile->url ?? 'Not Available' }}</a>
            </div>
        </div>
    </div>

    <div class="row ">
            @foreach($user->posts as $post)
            <div class="col-4 pb-4">
            <img src="/storage/{{ $post->image }}" class="w-100">
            </div>
        @endforeach

    </div>
</div>
@endsection
