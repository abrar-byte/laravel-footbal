@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Player</h1>

</div>
<div class="col-lg-8">


  <form method="post" action="/dashboard/players/{{ $player->slug }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
        autofocus value="{{ old('name', $player->name) }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required
        value="{{ old('slug', $player->slug) }}">
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>
    <div class="mb-3">
      <label for="team" class="form-label">team</label>
      <select class="form-select" name="team_id">
        @foreach ($teams as $team)
        @if (old('team_id', $player->team_id) == $team->id)
        <option value="{{ $team->id }}" selected>{{ $team->name }}</option>
        @else
        <option value="{{ $team->id }}">{{ $team->name }}</option>


        @endif

        @endforeach

      </select>
    </div>





    <div class="mb-3">
      <label for="height" class="form-label">Height</label>
      <input type="text" class="form-control @error('height') is-invalid @enderror" id="height" name="height" required
        value="{{ old('height',$player->height) }}">
      @error('height')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="weight" class="form-label">weight</label>
      <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" required
        value="{{ old('weight',$player->weight) }}">
      @error('weight')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="position" class="form-label">position</label>
      <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position"
        required value="{{ old('position',$player->position) }}">
      @error('position')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="number" class="form-label">number</label>
      <input type="text" class="form-control @error('number') is-invalid @enderror" id="number" name="number" required
        value="{{ old('number',$player->number) }}">
      @error('number')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update player</button>
  </form>

</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');


  name.addEventListener('change', function(){
    fetch('/dashboard/player/checkSlug?name=' + name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
{{--  menon aktifkan  trix editor upload--}}
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })
  function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    
    imgPreview.style.display = 'block';
    
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
  
    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result
    }
  }


</script>




@endsection