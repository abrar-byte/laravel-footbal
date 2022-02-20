@extends('layouts.main')

@section('container')
<div class="container">
  <div class="row justify-content-center mb-5">
    <div class="col-md-8">
      <h1 class="mb-3">{{ $player->name }}</h1>
      <p>By. <a href="/players?authors={{ $player->author->username }}" class="text-decoration-none">{{
          $player->author->name
          }}
        </a> in<a href="/players?team={{ $player->team->slug }}" class="text-decoration-none">
          {{ $player->team->name }}</a></p>

      @if ($player->image)
      <div style="max-height: 350px; overflow:hidden">
        <img src="{{ asset('storage/' .$player->image) }}" class="img-fluid " alt="{{ $player->team->name }}">
      </div>
      @else
      <img src="https://source.unsplash.com/1200x400?{{ $player->team->name }}" class="img-fluid "
        alt="{{ $player->team->name }}">
      @endif

      <article class="my-3 fs-5">
        {!! $player->height !!}
        <p>{{ $player->weight }}</p>
        <p>{{ $player->position }}</p>
        <p>{{ $player->number }}</p>


      </article>
      <a href="/players" class="d-block mt-3">Back to Players</a>
    </div>
  </div>
</div>


@endsection