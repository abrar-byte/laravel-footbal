@extends('layouts.main')

@section('container')

<h1 class="text-center mb-3">{{ $title }}</h1>
<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/players">
      @if (request('team'))
      <input type="hidden" name="team" value="{{ request('team') }}">

      @endif

      @if (request('author'))
      <input type="hidden" name="author" value="{{ request('author') }}">

      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search" value={{ request('search') }}>
        <button class="btn btn-danger" type="submit">Search</button>
      </div>

    </form>
  </div>
</div>

@if ($players->count())

<div class="card mb-3">
  {{-- @if ($players[0]->image)
  <div style="max-height: 400px; overflow:hidden">
    <img src="{{ asset('storage/' .$players[0]->image) }}" class="img-fluid " alt="{{ $players[0]->team->name }}">
  </div>
  @else --}}
  <img src="https://source.unsplash.com/1200x400?{{ $players[0]->team->name }}" class="card-img-top"
    alt="{{ $players[0]->team->name }}">

  {{-- @endif --}}

  <div class="card-body text-center">
    <h3 class="card-title"><a href="/players/{{ $players[0]->slug }}" class="text-decoration-none text-dark">{{
        $players[0]->name }}</a></h3>
    <p>
      <small class="text-muted">
        By. <a href="/players?author={{ $players[0]->author->username }}" class="text-decoration-none">{{
          $players[0]->author->name
          }}</a> in<a href="/players?team={{ $players[0]->team->slug }}" class="text-decoration-none "> {{
          $players[0]->team->name }}</a> {{ $players[0]->created_at->diffForHumans() }}
      </small>
    </p>

    <p class="card-text">{{ $players[0]->height }}</p>
    <p>{{ $players[0]->weight }}</p>
    <p>{{ $players[0]->position }}</p>
    <p>{{ $players[0]->number }}</p>

    <a href="/players/{{ $players[0]->slug }}" class="text-decoration-none btn btn-primary">Read More</a>

  </div>
</div>


<div class="container">
  <div class="row">
    @foreach ($players->skip(1) as $player)

    <div class="col-md-4 mb-3">
      <div class="card" style="width: 18rem;">
        <div class="position-absolute px-3 py-2 text-white" style="background-color : rgba(0,0,0,0.7)"><a
            href="/players?team={{ $player->team->slug }}" class="text-decoration-none text-white">{{
            $player->team->name }}</a></div>

        <img src="https://source.unsplash.com/500x400?{{ $player->team->name }}" class="card-img-top"
          alt="{{ $player->team->name }}">
        {{-- @endif --}}
        {{-- ambil gambar dari unsplash --}}

        <div class="card-body">
          <h5 class="card-title">{{ $player->name }}</h5>
          <p>
            <small class="text-muted">
              By. <a href="/players?author={{ $player->author->username }}" class="text-decoration-none">{{
                $player->author->name
                }}</a> {{ $player->created_at->diffForHumans() }}
            </small>
          </p>
          <p class="card-text">{{ $player->excerpt }}</p>
          <a href="/players/{{ $player->slug }}" class="text-decoration-none btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@else
<p class="text-center fs-4">No player found</p>
@endif



<div class="d-flex justify-content-end">

  {{ $players->links() }}
</div>


@endsection