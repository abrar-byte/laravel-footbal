@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Player</h1>

</div>
<div class="col-lg-8">


  <form method="post" action="/dashboard/players" class="mb-5">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
        autofocus value="{{ old('name') }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required
        value="{{ old('slug') }}">
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>
    <div class="mb-3">
      <label for="team" class="form-label">Tim</label>
      <select class="form-select" name="team_id">
        @foreach ($teams as $team)
        @if (old('team_id') == $team->id)
        <option value="{{ $team->id }}" selected>{{ $team->name }}</option>
        @else
        <option value="{{ $team->id }}">{{ $team->name }}</option>


        @endif

        @endforeach

      </select>
    </div>


    <div class="mb-3">
      <label for="height" class="form-label">Tinggi Badan</label>
      <input type="number" class="form-control @error('height') is-invalid @enderror" id="height" name="height" required
        value="{{ old('height') }}"><small class="text-muted">cm</small>
      @error('height')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="weight" class="form-label">Berat Badan</label>
      <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" required
        value="{{ old('weight') }}"><small class="text-muted">kg</small>
      @error('weight')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="position" class="form-label">Posisi</label>
      <select class="form-select" name="position">
        <option value="Striker" selected>Striker</option>
        <option value="Gelandang">Gelandang</option>
        <option value="Bek">Bek</option>
        <option value="Kiper">Kiper</option>


      </select>
      {{-- <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position"
        required value="{{ old('position') }}">
      @error('position')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror --}}
    </div>

    <div class="mb-3">
      <label for="number" class="form-label">Nomor Punggung</label>
      <input type="number" class="form-control @error('number') is-invalid @enderror" id="number" name="number" required
        value="{{ old('number') }}">
      @error('number')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Add Player</button>
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