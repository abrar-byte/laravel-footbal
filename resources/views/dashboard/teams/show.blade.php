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

      <form action="/dashboard/teams/{{ $team->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger " onclick="return confirm('Are you sure?')"><span
            data-feather="x-circle"></span>Delete</button>
      </form>

      <table class="table table-striped table-sm mt-4">
        <thead>
          <tr>
            <th scope="col">Nama Tim</th>
            <th scope="col">Tahun Berdiri</th>
            <th scope="col">Alamat Markas</th>
            <th scope="col">Kota Markas Tim</th>
            <th scope="col">Logo Tim </th>


          </tr>
        </thead>
        <tbody>

          <tr>
            <td>{{ $team->name }}</td>
            <td>{{ $team->year }}</td>
            <td>{{ $team->address }}</td>
            <td>{{ $team->city }}</td>
            <td> @if ($team->image)
              <div style=" overflow:hidden">
                <img src="{{ asset('storage/' .$team->image) }}" width="200" height="200" class="img-fluid mt-3"
                  alt="{{ $team->name }}">
              </div>
              @else
              <img src="https://source.unsplash.com/200x200?{{ $team->name }}" class="img-fluid mt-3"
                alt="{{ $team->name }}">
              @endif
            </td>

          </tr>

        </tbody>
      </table>



    </div>
  </div>
</div>


@endsection