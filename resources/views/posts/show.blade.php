@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-md-8">
        <img src="{{ asset('storage/'.$post->image) }}" alt="{{ $post->caption }}" class="img-fluid">
      </div>
    </div>
  </div>
@endsection