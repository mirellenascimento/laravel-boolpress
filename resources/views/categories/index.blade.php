@extends('layouts.app')

@section('content')

<section id="tags_index">
  <div class="container">
    <div class="row">
      <div class="col">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Posts</th>
            </tr>

          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <td>{{ $category->id}}</td>
              <td>{{ $category->title}}</td>
              <td>
                <a href="{{route('categories.show', $category->id)}}">
                See
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>

    </div>

  </div>

</section>


@endsection
