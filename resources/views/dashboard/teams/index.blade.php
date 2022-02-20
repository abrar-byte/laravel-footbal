@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Post teams</h1>

</div>
@if (session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}

</div>

@endif


<div class="table-responsive col-lg-6">
  <a href="/dashboard/teams/create" class="btn btn-primary mb-3">Create new team</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Team Name</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($teams as $team)

      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $team->name }}</td>
        <td>
          <a href="/dashboard/teams/{{ $team->slug }}" class="badge bg-info "><span data-feather="eye"></span></a>
          <a href="/dashboard/teams/{{ $team->slug }}/edit" class="badge bg-warning "><span
              data-feather="edit"></span></a>
          <form action="/dashboard/teams/{{ $team->slug }}" method="post" class="d-inline">
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