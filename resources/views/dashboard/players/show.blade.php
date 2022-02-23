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

      <form action="/dashboard/players/{{ $player->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger " onclick="return confirm('Are you sure?')"><span
            data-feather="x-circle"></span>Delete</button>
      </form>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">Nama Player</th>
            <th scope="col">Tim </th>
            <th scope="col">Tinggi Badan</th>
            <th scope="col">Berat Badan</th>
            <th scope="col">Posisi</th>
            <th scope="col">Nomor Punggung</th>



          </tr>
        </thead>
        <tbody>

          <tr>
            <td>{{ $player->name }}</td>
            <td>{{ $player->team->name }}</td>
            <td>{{ $player->height }}cm</td>
            <td>{{ $player->weight }}kg</td>
            <td>{{ $player->position }}</td>
            <td>{{ $player->number }}</td>

          </tr>

        </tbody>
      </table>



    </div>
  </div>
</div>


@endsection