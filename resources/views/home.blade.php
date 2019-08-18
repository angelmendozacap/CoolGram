@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <div class="row mb-5">
      <div class="col-12 col-md-4 px-5 d-flex justify-content-center align-items-start">
        <img src="https://instagram.flim5-3.fna.fbcdn.net/vp/94cf09b364ffc1947032d2621aaa1b79/5DDBFE38/t51.2885-19/s150x150/22709172_932712323559405_7810049005848625152_n.jpg?_nc_ht=instagram.flim5-3.fna.fbcdn.net" alt="Foto del perfil de freecodecamp" class="rounded-circle">
      </div>
      <div class="col-12 col-md-8">
        <h1 class="font-weight-lighter">{{ $user->username }}</h1>
        <div class="d-flex mb-3">
          <div class="mr-5"><strong>153</strong> publicaciones</div>
          <div class="mr-5"><strong>23k</strong> seguidores</div>
          <div class=""><strong>230</strong> seguidos</div>
        </div>
        <b>{{ $user->profile->title }}</b>
        <p class="mb-0">{{ $user->profile->description }}</p>
        <a href="{{ $user->profile->url ?? '#' }}">{{ $user->profile->url ?? 'N/D' }}</a>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6 col-lg-4">
        <img class="img-fluid" src="https://instagram.flim5-3.fna.fbcdn.net/vp/dde04fccbb758e16a564afebc04d36bb/5DEFEF77/t51.2885-15/sh0.08/e35/c2.0.745.745/s640x640/66652936_1155781834606033_3470611866102718174_n.jpg?_nc_ht=instagram.flim5-3.fna.fbcdn.net" alt="michi">
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <img class="img-fluid" src="https://instagram.flim5-3.fna.fbcdn.net/vp/37a6b2a603f5b773b8a97ddb89c473fa/5DDB60F3/t51.2885-15/sh0.08/e35/c0.2.751.751a/s640x640/69095403_212234716426916_3447102072665452317_n.jpg?_nc_ht=instagram.flim5-3.fna.fbcdn.net" alt="Groot">
      </div>
      <div class="col-12 col-md-6 col-lg-4">
        <img class="img-fluid" src="https://instagram.flim5-3.fna.fbcdn.net/vp/78a301cdd2c9965a4c465075245d7496/5E14F912/t51.2885-15/sh0.08/e35/c0.81.887.887/s640x640/66420383_162375928225341_762635906960426989_n.jpg?_nc_ht=instagram.flim5-3.fna.fbcdn.net" alt="Laravel">
      </div>
    </div>
  </div>
@endsection
