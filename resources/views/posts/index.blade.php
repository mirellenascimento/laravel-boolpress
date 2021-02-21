@extends('layouts.app')

@section('content')
<section id="post-index">
  <div class="container">
    <div class="row">
      <div class="col d-flex flex-wrap justify-content-around">

        @foreach($posts as $post)
        <div class="card" style="width: 18rem;">
          <div class="image_container">
            <a href="{{route('posts.show', $post->id)}}">
            <img src="{{$post->image_url}}" class="card-img-top" alt="post image">
            </a>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{substr($post->title, 0, 22)}}{{ strlen($post->title) > 22 ? '...': ''}}</h5>
            <p class="card-text"><a href="{{route('user.show', $post->user->id)}}">@ {{$post->user->username}}</a> </p>
            <p class="card-text">Category: <a href="{{route('categories.show', $post->category->id)}}"> {{$post->category->title}}</a> </p>
            <p class="card-text d-flex flex-wrap">
              @foreach($post->tags->slice(0, 3) as $tag)
              <a class="tags" href="{{route('tags.show', $tag->id)}}">#{{$tag->name}}</a>
              @endforeach
              {{count($post->tags) > 3 ? '...': ''}}
            </p>
            <p class="card-text small-text">{{date_format($post->created_at, "d F Y")}}</p>
            <div class="buttons">
              <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">See details</a>
              @auth
              @if (Auth::user()->id == $post->user->id)
              <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">Edit</a>
              @endif
              @endauth
            </div>

          </div>
        </div>
        @endforeach

      </div>
    </div>

    <div class="row">
      <div class="col">
        {{ $posts->links() }}
      </div>
    </div>
  </div>
</section>
@endsection
