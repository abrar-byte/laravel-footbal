@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row my-3">
    <div class="col-lg-8">
      <h1 class="mb-3">{{ $team->name }}</h1>
      <a href="/dashboard/teams" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my
        teams</a>

      <a href="/dashboard/teams/{{ $team->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>
        Edit</a>

      <form action="/dashboard/teams/{{ $team->slug }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger " onclick="return confirm('Are you sure?')"><span
            data-feather="x-circle"></span>Delete</button>
      </form>
      {{-- @if ($team->image)
      <div style="max-height: 350px; overflow:hidden">
        <img src="{{ asset('storage/' .$team->image) }}" class="img-fluid mt-3" alt="{{ $team->category->name }}">
      </div>
      @else
      <img src="https://source.unsplash.com/1200x400?{{ $team->category->name }}" class="img-fluid mt-3"
        alt="{{ $team->category->name }}">
      @endif --}}



      <article class="my-3 fs-5">
        <p>{{ $team->name }}</p>
        <p>{{ $team->year }}</p>
        <p>{{ $team->address }}</p>
        <p>{{ $team->city }}</p>
        {{-- <p>{{ $team->number }}</p> --}}


        {{-- {!! $team->body !!} --}}
      </article>
    </div>
  </div>
</div>


@endsection