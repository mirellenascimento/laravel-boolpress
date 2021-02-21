@extends('layouts.app')

@section('content')
<section id="post-edit">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="d-flex justify-content-center image_container">
          <img src="{{asset($post->image_url)}}" alt="image">
        </div>
        <form class="form-group" action="{{route('posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <label for="post_title">Title:</label>
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror


            <div class="d-flex flex-column">
              <label for="post_description">Description:</label>
              <textarea name="description" rows="8" cols="100%">{{$post->description}}</textarea>
            </div>
            @error('post_description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="row">
              <div class="col d-flex flex-column">
                  <label for="image_url">Change image: </label>
                  <input type="file" name="image_url">

                  @error('image_url')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

              <div class="col d-flex flex-column">
                <label for="categories">Category:</label>
                <select class="form-control" name="category_id">
                  <option value="empty"> --- </option>
                  @foreach($categories as $category)
                  <option value="{{$category->id}}" {{$post->category->id == $category->id ? "selected" : " "}}> {{$category->title}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col d-flex flex-column">
                <label for="new_category">New Category:</label>
                <input type="text" class="form-control" name="new_category">
              </div>
            </div>

            <div>
              <p>Tags:</p>
              <div>
                @foreach($post->tags as $tag)
                <input type="checkbox" id="{{"checked_".$tag->name}}" name="selected_tags[]" value="{{$tag->id}}" checked>
                @if($loop->last)
                <label class="form-check-label" for="{{"checked_".$tag->name}}">{{$tag->name}}</label>
                @else
                <label class="form-check-label" for="{{"checked_".$tag->name}}">{{$tag->name}}       |</label>
                @endif
                @endforeach
              </div>

              <label for="tags">New tags:</label>
              <input type="text" class="form-control" name="tags">
            </div>
            <div class="buttons">
              <button type="submit" class="btn btn-primary edit-btn" name="button">Confirm</button>
              <a href="{{route('posts.index')}}" class="btn btn-danger">Cancel</a>
            </div>

        </form>

      </div>
    </div>
  </div>
</section>


@endsection
