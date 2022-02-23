@extends('layouts.main')

@section('container')

<h1 class="mb-5">Teams</h1>


<div class="container">
  <div class="row">

    @foreach ($teams as $team)
    <div class="col-md-4 mb-2">

      {{-- <div class="card bg-dark text-white"> --}}
        <a href="/players?team={{ $team->slug }}" class="text-white">
          <div class="card mb-4" style="width: 18rem;">
            <h5 class="text-black text-center">Logo Tim</h5>
            @if ($team->image)
            <img src="{{ asset('storage/' .$team->image) }}" width="200" height="200" class="img-fluid"
              alt="{{ $team->name }}">
            @else
            <img src="https://source.unsplash.com/200x200?{{ $team->name }}" class="card-img-top"
              alt="{{ $team->name }}">
            @endif
            {{-- <div class="card-img-overlay d-flex align-items-center p-0">
              <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color:rgba(0, 0, 0, 0.7)">{{
                $team->name }}</h5>

            </div> --}}


            <div class="card-body text-black">
              <div class="card-title">
                <h5>Nama Tim :</h5>
                <p>{{ $team->name }}</p>
              </div>

              <div class="card-title">
                <h5>Tahun Berdiri</h5>
                <p>{{ $team->year }}</p>
              </div>
              <div class="card-title">
                <h5>Alamat Markas</h5>
                <p>{{ $team->address }}</p>
              </div>
              <div class="card-title">
                <h5>Kota Markas Tim</h5>
                <p>{{ $team->city }}</p>
              </div>





            </div>
            {{--
          </div> --}}

      </div>
      </a>
    </div>
    @endforeach

  </div>
</div>



@endsection