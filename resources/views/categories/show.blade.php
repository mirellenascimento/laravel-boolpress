@extends('layouts.app')

@section('content')

<section id="categories_show">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>{{$category->title}}</h1>
        <a href="{{route('categories.index')}}">See the list with all categories</a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h4>Posts in "{{$category->title}}" category:</h4>
        <ul>
          @foreach($category->post as $post)
          <li>
            <a href="{{route('posts.show', $post->id)}}">
              {{$post->title}} | created by {{$post->user->name}} | in {{date_format($post->created_at, "d F Y")}}
              </a>
          </li>
            @endforeach
        </ul>
      </div>
    </div>
  </div>


</section>


@endsection
