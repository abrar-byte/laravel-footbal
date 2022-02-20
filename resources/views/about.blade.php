{{--
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">

  <title>About</title>
</head>

<body>
  <h1>About</h1> --}}
  {{-- <h3>{{$name }} </h3> --}}


  {{-- <p> {{ $status }}</p> --}}

  {{-- <img src="img/{{ $gambar }}" alt="usamah" width="200"> --}}
  {{--
</body> --}}
{{--

</html> --}}
@extends('layouts.main')

@section('container')
<h3>{{$name }} </h3>
<p> {{ $status }}</p>
<img src="img/{{ $gambar }}" alt={{ $name }} width="200" class="img-thumbnail">
@endsection