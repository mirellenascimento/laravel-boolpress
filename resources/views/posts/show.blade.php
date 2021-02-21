@extends('layouts.app')

@section('content')
<section id="post-show">
  <div class="container">
    <div class="row">
      <div class="col d-flex flex-wrap justify-content-around">

        <div class="card" style="width: 600px;">
          <div class="image_container align-self-center">
            <img src="{{asset($post->image_url)}}" class="card-img-top" alt="post image">
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->description}}</p>
            <p class="card-text small-text">{{date_format($post->created_at, "d F Y")}}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="{{route('user.show', $post->user->id)}}">@ {{$post->user->username}}</a></li>
            <li class="list-group-item">Category: <a href="{{route('categories.show', $post->category->id)}}">{{$post->category->title}}</a> </li>
            <li class="list-group-item">
              @foreach($post->tags as $tag)
              <a href="{{route('tags.show', $tag->id)}}">#{{$tag->name}}</a>
              @endforeach
            </li>
          </ul>
          <div class="card-body d-flex justify-content-around align-items-center">
            <a href="{{route('posts.index')}}" class="btn btn-outline-primary">See all posts</a>

            @auth
            @if(Auth::user()->id == $post->user->id)
            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-outline-primary">Edit Post</a>
            <a href="{{route('posts.create')}}" class="btn btn-outline-primary">Create New Post</a>
            <form action="{{route('posts.destroy', $post->id)}}" method="POST">
             @method('DELETE')
             @csrf
             <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            @endif
            @endauth

          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection
