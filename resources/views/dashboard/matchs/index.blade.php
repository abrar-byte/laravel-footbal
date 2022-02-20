@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Players</h1>

</div>
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}

</div>

@endif


<div class="table-responsive col-lg-8">
  <a href="/dashboard/matchs/create" class="btn btn-primary mb-3">Add Player</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Home Team</th>
        <th scope="col">Away Team</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      {{-- @foreach ($matchs as $match)



      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $match->home_team_gol }}</td>

        <td>{{ $match->away_team_goal }}</td>
        <td>{{ $match->skor }}</td>

        <td>

          <a href="/dashboard/matchs/{{ $match->id }}/edit" class="badge bg-warning "><span
              data-feather="edit"></span></a>
          <form action="/dashboard/matchs/{{ $match->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                data-feather="x-circle"></span></button>
          </form>
        </td>
      </tr>
      @endforeach --}}

    </tbody>
  </table>
</div>


@endsection