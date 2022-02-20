@extends('layouts.main')

@section('container')

<h1 class="mb-5">Match Result</h1>


<div class="container">
  <div class="row">
    {{-- {{ $count }} --}}
    @foreach ($matchs as $match)
    <div class="col-md-4 mb-2">

      <div class="card ">

        <img src="https://source.unsplash.com/500x400?football" class="card-img-top" alt="{{ $match->name }}">

        <div class="card-img-overlay d-flex align-items-start mt-5 p-0">
          <div class="card-title  text-white text-center flex-fill p-5 fs-1"
            style="background-color:rgba(0, 0, 0, 0.7)">
            <h5>Hasil Pertandingan</h5>
            {{-- {{
            $match->home_team_skor }} - {{
            $match->away_team_skor }} --}}

            {{ $match->schedule->homeTeam->name }}
            {{ $match->schedule->awayTeam->name }}
          </div>

        </div>
        <div class="card-body d-flex justify-content-between">
          <div>
            <p class="text-muted">Pencetak Gol</p>

            @foreach($scores as $score)
            <p> </p>

            <p> {{ $score->player->name }} from {{ $score->player->team->name }}</p>
            <p> {{ $score->goal_minute }}</p>

            @endforeach



          </div>

        </div>


      </div>
    </div>
    @endforeach


  </div>
</div>



@endsection