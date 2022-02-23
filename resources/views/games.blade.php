@extends('layouts.main')

@section('container')

<h1 class="mb-5">Hasil Pertandingan</h1>


<div class="container">
  <div class="row mb-5">
    {{-- {{ $count }} --}}
    <div class="card mt-5">
      <div class="card-body">

        <h5 class="text-center my-4">Hasil Pertandingan</h5>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Pertandingan</th>
              <th>Pencetak Gol</th>
              <th>Menit Gol</th>

              <th width="1%">Skor Akhir</th>
            </tr>
          </thead>
          <tbody>



            @foreach($games as $key =>$game)

            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $game->schedule->homeTeam->name }} - {{ $game->schedule->awayTeam->name }}
              </td>



              <td>
                <ul>
                  @if ($game->player->count())

                  @foreach($game->player as $key => $h)


                  <li> {{ $h->name }} from {{ $h->team->name }} </li>


                  @endforeach
                  @else
                  <p class="text-danger">Hasil Pertandingan belum ada</p>
                  @endif


                </ul>
              </td>
              <td>
                <ul>
                  @if ($game->player->count())

                  @foreach($game->player as $key => $h)



                  <li> {{ $h->pivot->goal_minute }} </li>


                  @endforeach
                  @else
                  <p class="text-danger">Hasil Pertandingan belum ada</p>
                  @endif
                </ul>
              </td>
              <td class="text-center">{{ $game->player->where('team_id', '=', $game->schedule->home_team_id)->count() }}
                - {{
                $game->player->where('team_id', '=', $game->schedule->away_team_id)->count() }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>


  </div>
</div>



@endsection