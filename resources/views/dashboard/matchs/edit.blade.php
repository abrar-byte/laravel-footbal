@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Schedule</h1>

</div>
<div class="col-lg-8">


  <form method="post" action="/dashboard/schedules/{{ $schedule->id }}" class="mb-5">
    @method('put')
    @csrf
    <div class="mb-3 d-flex flex-column">
      <label for="home_team" class="form-label">Away Team</label>
      <small id="home_teamHelp" class="form-text text-muted">{{ old('home_team',$schedule->home_team) }}</small>

      <select class="form-select" name="home_team">
        @foreach ($teams as $team)

        <option value="{{ $team->name }}">{{ $team->name }}</option>



        @endforeach

      </select>
    </div>

    <div class="mb-3 d-flex flex-column">
      <label for="away_team" class="form-label">Away Team</label>
      <small id="away_teamHelp" class="form-text text-muted">{{ old('away_team',$schedule->away_team) }}</small>

      <select class="form-select" name="away_team">
        @foreach ($teams as $team)

        <option value="{{ $team->name }}">{{ $team->name }}</option>



        @endforeach

      </select>
    </div>


    <div class="mb-3">
      <label for="tanggal" class="form-label">tanggal</label>
      <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"
        value="{{ old('tanggal',$schedule->tanggal) }}">
      @error('tanggal')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>

    <div class="mb-3">
      <label for="waktu" class="form-label">Waktu</label>
      <input type="time" class="form-control @error('waktu') is-invalid @enderror" id="waktu" name="waktu"
        value="{{ old('waktu',$schedule->waktu) }}">
      @error('waktu')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>





    <button type="submit" class="btn btn-primary">Update Schedule</button>
  </form>

</div>





@endsection