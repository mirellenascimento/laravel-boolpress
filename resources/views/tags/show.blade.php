@extends('layouts.app')

@section('content')

<section id="tags_show">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>{{$tag->name}}</h1>
        <a href="{{route('tags.index')}}">See the list with all tags</a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h4>Posts tagged with "{{$tag->name}}":</h4>
        <ul>
          @foreach($tag->posts as $post)
          <li>
            <a href="{{route('posts.show', $post->id)}}">
              {{$post->title}} | created by {{$post->user->name}} | in {{date_format($post->created_at, "d F Y")}}
          </li>
            @endforeach
        </ul>
      </div>
    </div>
  </div>


</section>


@endsection
