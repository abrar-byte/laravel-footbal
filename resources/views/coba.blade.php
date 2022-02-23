<!DOCTYPE html>
<html>

<head>
  <title>Tutorial Laravel #25 : Relasi Many To Many Eloquent</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container">
    <div class="card mt-5">
      <div class="card-body">
        <h3 class="text-center"><a href="https://www.malasngoding.com">www.malasngoding.com</a></h3>
        <h5 class="text-center my-4">Eloquent Many To Many Relationship</h5>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama Pengguna</th>
              <th>Hadiah</th>
              <th width="1%">Jumlah</th>
            </tr>
          </thead>
          <tbody>

            {{-- {{ $mapping }} --}}

            @foreach($coba as $a)

            <tr>
              {{-- {{ $a->player }} --}}
              <td>{{ $a->schedule->homeTeam->name }} - {{ $a->schedule->awayTeam->name }}
              </td>
              <p>{{ $a->created_at->diffinMinutes() }}</p>
              {{-- @dd($a->created_at) --}}



              <td>
                <ul>
                  @foreach($a->player as $key => $h)
                  {{-- @dd(strip_tags($h->pivot->goal_minute)) --}}
                  {{-- {!! strip_tags($h->pivot->goal_minute)->diffinMinutes() !!} --}}
                  {{ $h->pivot->goal_minute }}
                  {{-- {{ date('H:i:s', strtotime($h->pivot->goal_minute))->diffInMinutes() }} --}}
                  {{-- <p>{{ $h->pivot->goal_minute->format('i:s') }}</p> --}}
                  <li> {{ $h->name }} from {{ $h->team->name }} </li>


                  @endforeach
                </ul>




              <td class="text-center">{{ $a->player->where('team_id', '=', $a->schedule->home_team_id)->count() }} - {{
                $a->player->where('team_id', '=', $a->schedule->away_team_id)->count() }}</td>


              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>

</html>