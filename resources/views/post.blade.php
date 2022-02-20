@extends('layouts.main')

@section('container')
<div class="container">
  <div class="row justify-content-center mb-5">
    <div class="col-md-8">
      <h1 class="mb-3">{{ $post->title }}</h1>
      <p>By. <a href="/blog?authors={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name
          }}
        </a> in<a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">
          {{ $post->category->name }}</a></p>

      @if ($post->image)
      <div style="max-height: 350px; overflow:hidden">
        <img src="{{ asset('storage/' .$post->image) }}" class="img-fluid " alt="{{ $post->category->name }}">
      </div>
      @else
      <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid "
        alt="{{ $post->category->name }}">
      @endif

      <article class="my-3 fs-5">
        {!! $post->body !!}
      </article>
      <a href="/blog" class="d-block mt-3">Back to Blog</a>
    </div>
  </div>
</div>

{{-- <article> --}}
  {{-- <h1 class="mb-5">{{ $post->title }}</h1> --}}
  {{-- <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}
    </a> --}}
    {{-- in<a href="/categories/{{ $post->category->slug }}" class="text-decoration-none"> {{ $post->category->name
      }}</a> --}}
    {{-- </p> --}}
  {{-- <h5>{{ $post["author"] }}</h5> --}}
  {{-- <p>{!! $post->body !!}</p> --}}
  {{-- biar tag p nya terbaca hapus tag p di sin, hapus kurung kurawal satu dan tambahkan tanda seru --}}
  {{-- {!! $post->body !!} --}}

  {{--
</article> --}}
{{-- <br /> --}}
{{-- <a href="/blog" class="d-block mt-3">Back to Blog</a> --}}
@endsection