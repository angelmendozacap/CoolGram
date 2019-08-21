@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <div class="row mb-5">
      <div class="col-12 col-md-4 px-5 d-flex justify-content-center align-items-start">
        <img src="{{ $user->profile->profileImage() }}" class="rounded-circle img-fluid" alt="{{ $user->username }}">
      </div>
      <div class="col-12 col-md-8">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-2">
          <div class="d-flex align-items-center">
            <h1 class="font-weight-lighter mb-0">{{ $user->username }}</h1>
            @can('update', $user->profile)
              <a href="{{ route('profile.edit', ['user' => $user->id]) }}" class="ml-3 btn btn-sm btn-outline-secondary">Editar Perfil</a>
            @endcan
            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
          </div>
          @can('update', $user->profile)
            <a class="btn btn-sm btn-outline-primary" href="{{ route('p.create') }}">Agrega una Nueva Publicación</a>
          @endcan
        </div>
        <div class="d-flex mb-3">
          <div class="mr-5"><strong>{{ $user->posts->count() }}</strong> publicaciones</div>
          <div class="mr-5"><strong>{{ $user->profile->followers->count() }}</strong> seguidores</div>
          <div class=""><strong>{{ $user->following->count() }}</strong> siguiendo</div>
        </div>
        <b>{{ $user->profile->title }}</b>
        <p class="mb-0">{{ $user->profile->description }}</p>
        <a href="{{ $user->profile->url ?? '#' }}">{{ $user->profile->url ?? 'N/D' }}</a>
      </div>
    </div>
    <div class="row">
      @foreach($user->posts as $post)
      <div class="col-12 col-md-6 col-lg-4 pb-4">
        <a href="{{ route('p.show', ['post' => $post->id]) }}">
          <img class="img-fluid" src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->caption }}">
        </a>
      </div>
      @endforeach
    </div>
  </div>
@endsection
