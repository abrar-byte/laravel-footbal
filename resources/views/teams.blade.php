@extends('layouts.main')

@section('container')

<h1 class="mb-5">Teams</h1>


<div class="container">
  <div class="row">

    @foreach ($teams as $team)
    <div class="col-md-4 mb-2">
      <a href="/players?team={{ $team->slug }}" class="text-white">
        <div class="card bg-dark text-white">
          @if ($team->image)

          <img src="{{ asset('storage/' .$team->image) }}" class="img-fluid" alt="{{ $team->name }}">
          @else
          <img src="https://source.unsplash.com/500x400?{{ $team->name }}" class="card-img-top" alt="{{ $team->name }}">
          @endif
          <div class="card-img-overlay d-flex align-items-center p-0">
            <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color:rgba(0, 0, 0, 0.7)">{{
              $team->name }}</h5>

          </div>
      </a>
    </div>
  </div>
  @endforeach

</div>
</div>



@endsection