@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <form action="{{ route('profile.update', ['user' => $user->id]) }}" enctype="multipart/form-data" method="post">
      @csrf
      @method('PATCH')
      <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
          <h1>Editar Perfil</h1>
          <div class="form-group">
            <label for="title" class="col-form-label">Título</label>

            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                   value="{{ old('title') ?? $user->profile->title }}" autofocus>

            @error('title')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="description" class="col-form-label">Descripción</label>

            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                   value="{{ old('description') ?? $user->profile->description }}" autofocus>

            @error('description')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="url" class="col-form-label">URL</label>

            <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url"
                   value="{{ old('url') ?? $user->profile->url }}" autofocus>

            @error('url')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="image" class="col-form-label">Imagen de Perfil</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">

            @error('image')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="pt-3 form-group">
            <button type="submit" class="btn btn-outline-primary">Guardar Perfil</button>
          </div>

        </div>
      </div>
    </form>
  </div>
@endsection
