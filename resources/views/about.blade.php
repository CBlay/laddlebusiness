@extends('layouts.app')

@section('title')
@foreach ($name as $uu)
About Us | {{ $uu->shopname }}
@endforeach
@endsection
@section('content')
<section class="hero is-medium is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title is-3 has-text-primary">About
        @foreach ($name as $uu)
         {{ $uu->shopname }}
        @endforeach
      </h1><hr>
      <p class="subtitle is-5">
        @foreach ($name as $uu)
         {{ $uu->about }}
        @endforeach
      </p>
    </div>
  </div>
</section>
@endsection
