@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <div class="row mb-5">
      <div class="col-12 col-md-4 px-5 d-flex justify-content-center align-items-start">
        <img src="https://instagram.flim5-3.fna.fbcdn.net/vp/94cf09b364ffc1947032d2621aaa1b79/5DDBFE38/t51.2885-19/s150x150/22709172_932712323559405_7810049005848625152_n.jpg?_nc_ht=instagram.flim5-3.fna.fbcdn.net" alt="Foto del perfil de freecodecamp" class="rounded-circle">
      </div>
      <div class="col-12 col-md-8">
        <div class="d-flex justify-content-between align-items-center">
          <h1 class="font-weight-lighter">{{ $user->username }}</h1>
          <a href="{{ route('p.create') }}">Agrega una Nueva Publicación</a>
        </div>
        <div class="d-flex mb-3">
          <div class="mr-5"><strong>{{ $user->posts->count() }}</strong> publicaciones</div>
          <div class="mr-5"><strong>23k</strong> seguidores</div>
          <div class=""><strong>230</strong> seguidos</div>
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
