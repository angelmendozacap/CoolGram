@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    @foreach ($posts as $post)
      <div class="row">
        <div class="col-12 col-md-6 col-sm-8 offset-md-3 offset-sm-2">
          <a href="{{ route('p.show', ['post' => $post->id]) }}">
            <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->caption }}" class="img-fluid">
          </a>
        </div>
      </div>
      <div class="row py-4">
        <div class="col-12 col-md-6 col-sm-8 offset-md-3 offset-sm-2">
          <div class="d-flex align-items-center">
            <div class="pr-3">
              <img style="width: 40px;" src="{{ $post->user->profile->profileImage() }}" alt="{{ $post->user->username }}" class="img-fluid rounded-circle">
            </div>
            <div>
              <h5 class="mb-0 font-weight-bold h6 d-inline">
                <a class="text-dark" href="{{ route('profile.show', ['user' => $post->user->id]) }}">{{ $post->user->username }}</a>
              </h5>
            </div>
          </div>
          <hr>
          <div class="text-black-50">
            <p>
              <span class="mb-0 d-inline font-weight-bold h6">
                <a href="{{ route('profile.show', ['user' => $post->user->id]) }}" class="text-dark">
                  <span>{{ $post->user->username }}</span>
                </a>
              </span> {{ $post->caption }}
            </p>
          </div>
        </div>
      </div>
    @endforeach
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        {{ $posts->links() }}
      </div>
    </div>
  </div>
@endsection