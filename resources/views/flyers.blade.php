@extends('layouts.app')
@section('title')
@foreach ($name as $uu)
Flyers | {{ $uu->shopname }}
@endforeach
@endsection
@section('content')
<section class="section">
  <div class="container">
    <h2 class="title has-text-primary">Upload Flyers & Banners</h2><hr>
    @if(session()->get('message2'))
        <div class="notification is-success is-light subtitle is-4">
          <button class="delete"></button>
           {{ session()->get('message2') }}
        </div>
    @endif

    <form method="post" action="{{ route('flyers') }}" enctype="multipart/form-data">

    <div class="field">
      <label class="label">Description</label>
      <div class="control">
        <textarea class="textarea @error('description') is-invalid @enderror"  name="description" type="text" autocomplete="description" autofocus placeholder="Describe your product to your customers"></textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong class="has-text-danger">{{ $message }}</strong>
            </span>
        @enderror
      </div>
    </div>



  <div class="field">
    <label class="label">Display</label>
    <div class="control">
      <select class="input select" name="page" type="text" autocomplete="page" autofocus placeholder="Select page to display product">
        <option value="featured">Flyer</option>
        <option value="banner">Banner</option>
      </select>
      @error('page')
          <span class="invalid-feedback" role="alert">
              <strong class="has-text-danger">{{ $message }}</strong>
          </span>
      @enderror
    </div>
  </div>

  <div class="field">
    <label class="label">Image</label>
    <div class="control">
      <input class="input" name="image" type="file" autocomplete="image" autofocus placeholder="upload product image">
      @error('image')
          <span class="invalid-feedback" role="alert">
              <strong class="has-text-danger">{{ $message }}</strong>
          </span>
      @enderror
    </div>
  </div>

  <hr>

    <div class="field is-grouped">
      <div class="control">
        <button type="submit" class="button is-medium is-link">Upload Image</button>
      </div>
    </div>
    </form>

  </div>
</section>

@endsection
