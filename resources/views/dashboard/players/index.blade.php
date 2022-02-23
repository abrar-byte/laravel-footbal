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
  <a href="/dashboard/players/create" class="btn btn-primary mb-3">Add Player</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Pemain</th>
        <th scope="col">Tim</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($players as $player)

      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $player->name }}</td>
        <td>{{ $player->team->name }}</td>
        <td>
          <a href="/dashboard/players/{{ $player->slug }}" class="badge bg-info "><span data-feather="eye"></span></a>
          <a href="/dashboard/players/{{ $player->slug }}/edit" class="badge bg-warning "><span
              data-feather="edit"></span></a>
          {{-- <form action="/dashboard/players/{{ $player->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                data-feather="x-circle"></span></button>
          </form> --}}
          <form action="/dashboard/players/{{ $player->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                data-feather="x-circle"></span></button>
          </form>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>


@endsection