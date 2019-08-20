@extends('layouts.app')

@section('content')
  <div class="container mt-3">
    <form action="{{ route('p.store') }}" enctype="multipart/form-data" method="post">
      @csrf
      <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
          <h1>Agrega una Nueva Publicación</h1>
          <div class="form-group">
            <label for="caption" class="col-form-label">Título</label>

            <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption"
                   value="{{ old('caption') }}" autofocus>

            @error('caption')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="image" class="col-form-label">Imagen</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">

            @error('image')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="pt-3 form-group">
            <button type="submit" class="btn btn-primary">Agregar Publicación</button>
          </div>

        </div>
      </div>
    </form>
  </div>
@endsection