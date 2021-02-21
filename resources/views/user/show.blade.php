@extends('layouts.app')

@section('content')
<section id="user-show">
  <div class="container">
    <div class="row">
      <div class="col d-flex justify-content-center">
        <a href="{{route('user.index')}}" class="btn btn-outline-primary">See all users</a>
        @auth
        @if(Auth::user()->id == $user->id)
        <a href="{{route('user.edit', $user->id)}}" class="btn btn-outline-secondary">Edit Profile</a>
        @endif
        @endauth

      </div>

    </div>
    <div class="row">
      <div class="col d-flex flex-wrap justify-content-around">

        <div class="card" style="width: 600px;">
          <div class="image_container align-self-center">
            <img src="{{asset($user->image_url)}}" class="card-img-top" alt="user image">
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$user->name}}</h5>
            <p class="card-text">{{$user->description}}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">@ {{$user->username}}</li>
            <li class="list-group-item">{{$user->birthday}}</li>
            <li class="list-group-item">{{$user->email}}</li>
          </ul>
          <div class="card-body">
            <h6 href="#">Posts created by @ {{$user->username}} </h6>
            <div class="d-flex flex-column">
              @foreach($posts as $post)
              <a href="{{route('posts.show', $post->id)}}">{{substr($post->title, 0, 70)}}{{ strlen($post->title) > 70 ? '...': ''}}
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
