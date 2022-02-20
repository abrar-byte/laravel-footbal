{{-- 
@extends('layouts.main')

@section('container')

<h1>Posts Category : {{ $category }}</h1> 
@foreach ($posts as $post)
  <article class="mb-5">   --}}
    {{--  href menuju ke sesuai slugnya  --}}
    
{{-- <h2><a href="blog/{{ $post["slug"] }}">{{ $post["title"] }}</a></h2> --}}
{{-- diganti id dan pakainya object ya ges ya --}}
{{-- <h2><a href="/blog/{{ $post->slug }}">{{ $post->title }}</a></h2> --}}

{{-- <h5>By: {{ $post["author"] }}</h5> --}}
{{-- <p>{{ $post->excerpt }}</p>
</article>
@endforeach
    
@endsection --}}

