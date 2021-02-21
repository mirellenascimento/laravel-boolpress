
@extends('layouts.app')


@section('content')

<section id="posts-create">
    <div class="container">
      <div class="row">
        <div class="col">
          <form class="form-group" action="{{route('posts.store', $post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
              <label for="post_title">Title:</label>
              <input type="text" class="form-control" name="title" value="{{old('$post->title')}}">
              @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror


              <div class="d-flex flex-column">
                <label for="post_description">Description:</label>
                <textarea name="description" rows="8" cols="100%">{{old('$post->postInformation->description')}}</textarea>
              </div>
              @error('post_description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror

              <div class="row">
                <div class="col d-flex flex-column">
                    <label for="image_url">Image: </label>
                    <input type="file" name="image_url" value="{{ old('image_url') }}" required>

                    @error('image_url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col d-flex flex-column">
                  <label for="category_id">Category: </label>
                  <select class="form-control" name="category_id">
                    <option value="empty"> --- </option>

                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col d-flex flex-column">
                  <label for="new_category">New Category:</label>
                  <input type="text" class="form-control" name="new_category" value="{{old('$post->new_category')}}">
                </div>

              </div>

              <div>
                <label for="tags">Tags:</label>
                <input type="text" class="form-control" name="tags" value="{{old('$post->tags')}}" placeholder="Separated by comma (tag1, tag2, tag3)">
              </div>
              <div class="buttons">
                <button type="submit" class="btn btn-primary edit-btn" name="button">Create post</button>
                <a href="{{route('posts.index')}}" class="btn btn-danger">Cancel</a>
              </div>

          </form>

        </div>
      </div>
    </div>
</section>


@endsection
