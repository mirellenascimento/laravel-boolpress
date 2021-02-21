@extends('layouts.app')

@section('content')
<section id="user-index">
  <div class="container">
    <div class="row">
      <div class="col d-flex justify-content-center">
        <form class="d-flex align-items-center" action="{{ route('user.index') }}">
          <input class="form-control me-2" type="search" placeholder="Find a user" aria-label="Search" value="" name="search">
          <button class="btn btn-secondary" type="submit">Search</button>
        </form>
        <a class="btn btn-secondary" href="{{ route('user.index') }}">See all users</a>

      </div>
    </div>
    <div class="row">
      <div class="col d-flex flex-wrap justify-content-around">

        @foreach($users as $user)
        <div class="card" style="width: 18rem;">
          <div class="image_container">
            <a href="{{route('user.show', $user->id)}}">
            <img src="{{$user->image_url}}" class="card-img-top" alt="user image">
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$user->name}}</h5>
            <p class="card-text">@ {{$user->username}}</p>
            <a href="{{route('user.show', $user->id)}}" class="btn btn-primary">See details</a>
            @auth
            @if(Auth::user()->id == $user->id)
            <a href="{{route('user.edit', $user->id)}}" class="btn btn-outline-secondary">Edit Profile</a>
            @endif
            @endauth
          </div>
        </div>
        @endforeach

      </div>
    </div>

    <div class="row">
      <div class="col">
        {{ $users->links() }}
      </div>
    </div>
  </div>
</section>
@endsection
