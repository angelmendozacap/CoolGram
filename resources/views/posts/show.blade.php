@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-md-8">
        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->caption }}" class="img-fluid">
      </div>
      <div class="col-12 col-md-4">
        <div class="d-flex align-items-center">
          <div class="pr-3">
            <img style="width: 40px;" src="{{ $post->user->profile->profileImage() }}" alt="{{ $post->user->username }}" class="img-fluid rounded-circle">
          </div>
          <div>
            <h5 class="mb-0 font-weight-bold h6 d-inline">
              <a class="text-dark" href="{{ route('profile.show', ['user' => $post->user->id]) }}">{{ $post->user->username }}</a>
            </h5>
            <a href="#" class="pl-3">Seguir</a>
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
  </div>
@endsection