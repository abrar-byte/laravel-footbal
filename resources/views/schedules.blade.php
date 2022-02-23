@extends('layouts.main')

@section('container')

<h1 class="mb-5">Schedules</h1>


<div class="container">
  <div class="row">
    <div class="table-responsive col-lg-8">
      <table class="table table-success table-striped table-md">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Home Team</th>
            <th scope="col">Away Team</th>
            <th scope="col">Date</th>
            <th scope="col">Time</th>
            <th scope="col">Tap</th>



          </tr>
        </thead>
        <tbody>
          @foreach ($schedules as $schedule)

          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $schedule->homeTeam->name }}</td>
            <td>{{ $schedule->awayTeam->name }}</td>
            <td>{{ $schedule->tanggal }}</td>
            <td>{{ $schedule->waktu }}</td>
            <td>
              <a href="/game?schedule={{ $schedule->id }}" class="text-white">TAP
              </a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>

  </div>
</div>



@endsection