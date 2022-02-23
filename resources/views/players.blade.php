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



<div class="container">
  <div class="row">
    @foreach ($players as $player)

    <div class="col-md-4 mb-3">
      <div class="card" style="width: 18rem;">
        <div class="px-3 py-2 text-white" style="background-color : rgba(0,0,0,0.7)"><a
            href="/players?team={{ $player->team->slug }}" class="text-decoration-none text-white">{{
            $player->team->name }}</a></div>


        <div class="card-body">
          <div class="card-title">
            <h5>Nama Pemain :</h5>
            <p>{{ $player->name }}</p>
          </div>
          <div class="card-title">
            <h5>Tim</h5>
            <p>{{ $player->team->name }}</p>
          </div>
          <div class="card-title">
            <h5>Tinggi Badan</h5>
            <p>{{ $player->height }}cm</p>
          </div>
          <div class="card-title">
            <h5>Berat Badan</h5>
            <p>{{ $player->weight }}kg</p>
          </div>
          <div class="card-title">
            <h5>Posisi</h5>
            <p>{{ $player->position }}</p>
          </div>
          <div class="card-title">
            <h5>Nomor Punggung</h5>
            <p>{{ $player->number }}</p>
          </div>





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