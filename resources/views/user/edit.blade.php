@extends('layouts.app')

@section('content')
<section id="user-edit">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Edit Profile') }}</div>

                  <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-center image_container align-self-center">
                      <img src="{{asset($user->image_url)}}" alt="image">
                    </div>

                      <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                          @csrf
                          @method('PUT')

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                              <div class="col-md-6">
                                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>

                                  @error('name')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                              <div class="col-md-6">
                                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{Auth::user()->username}}" required autocomplete="username" autofocus>

                                  @error('username')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>Username must be minimum 3 caracters. Special caracters ans spaces are nont allowed</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                              <div class="col-md-6">
                                  <textarea id="description" rows="8" cols="80" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{Auth::user()->description}}</textarea>

                                  @error('description')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                              <div class="col-md-6">
                                  <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ Auth::user()->birthday }}" required autocomplete="birthday" autofocus>

                                  @error('birthday')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>

                          <div class="form-group row d-flex align-items-center">
                              <label for="image_url" class="col-md-4 col-form-label text-md-right">{{ __('Chande profile image') }}</label>

                              <div class="col">
                                  <input id="image_url" type="file" name="image_url">

                                  @error('image_url')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                              </div>
                          </div>


                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Edit Profile') }}
                                  </button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection
