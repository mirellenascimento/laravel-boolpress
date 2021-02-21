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
              <th>Name</th>
              <th>Posts</th>
            </tr>

          </thead>
          <tbody>
            @foreach($tags as $tag)
            <tr>
              <td>{{ $tag->id}}</td>
              <td>{{ $tag->name}}</td>
              <td>
                <a href="{{route('tags.show', $tag->id)}}">
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
