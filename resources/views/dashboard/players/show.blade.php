@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row my-3">
    <div class="col-lg-8">
      <h1 class="mb-3">{{ $player->name }}</h1>
      <a href="/dashboard/players" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my
        players</a>

      <a href="/dashboard/players/{{ $player->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>
        Edit</a>

      <form action="/dashboard/players/{{ $player->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger " onclick="return confirm('Are you sure?')"><span
            data-feather="x-circle"></span>Delete</button>
      </form>
      {{-- @if ($player->image)
      <div style="max-height: 350px; overflow:hidden">
        <img src="{{ asset('storage/' .$player->image) }}" class="img-fluid mt-3" alt="{{ $player->category->name }}">
      </div>
      @else
      <img src="https://source.unsplash.com/1200x400?{{ $player->category->name }}" class="img-fluid mt-3"
        alt="{{ $player->category->name }}">
      @endif --}}



      <article class="my-3 fs-5">
        <p>{{ $player->name }}</p>
        <p>{{ $player->height }}</p>
        <p>{{ $player->weight }}</p>
        <p>{{ $player->position }}</p>
        <p>{{ $player->number }}</p>


        {{-- {!! $player->body !!} --}}
      </article>
    </div>
  </div>
</div>


@endsection