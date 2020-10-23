@extends('layouts.app')
@section('title')
@foreach ($name as $uu)
Home | {{ $uu->shopname }}
@endforeach
@endsection
@section('content')
<section class="hero is-fullheight">
<div class="hero-body">
  <div class="container">
<h1 class="title is-3 has-text-primary">Let's help you set up!</h1><hr>

<form method="post" action="{{ route('started') }}" enctype="multipart/form-data">
<div class="field">
  <label class="label">Business Name</label>
  <div class="control">
    <input class="input @error('shopname') is-invalid @enderror"  name="shopname" type="text" value="@foreach ($name as $uu){{ $uu->shopname }}@endforeach" autocomplete="shopname" autofocus placeholder="Your business name goes here">
    @error('shopname')
        <span class="invalid-feedback" role="alert">
            <strong class="has-text-danger">{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>

<div class="field">
  <label class="label">About Business</label>
  <div class="control">
    <textarea class="textarea @error('about') is-invalid @enderror" name="about" type="text" autocomplete="shopname" autofocus placeholder="Tell your customers something about your business">@foreach ($name as $uu){{ $uu->about }}@endforeach</textarea>
    @error('about')
        <span class="invalid-feedback" role="alert">
            <strong class="has-text-danger">{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>

<div class="field">
  <label class="label">Phone Number</label>
  <div class="control">
    <input class="input" name="phone" type="tel" autocomplete="phone" value="@foreach ($name as $uu){{ $uu->phone }}@endforeach" autofocus placeholder="Enter business phone number for customers to reach you">
    @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong class="has-text-danger">{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>

<div class="field">
  <label class="label">Email</label>
  <div class="control">
    <input class="input" name="email" type="email" autocomplete="email" value="@foreach ($name as $uu){{ $uu->email }}@endforeach" autofocus placeholder="Enter business email address for customers to reach you">
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong class="has-text-danger">{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>

<div class="field">
  <label class="label">Instagram</label>
  <div class="control">
    <input class="input @error('instagram') is-invalid @enderror"  name="instagram" type="text" autocomplete="instagram" value="@foreach ($name as $uu){{ $uu->instagram }}@endforeach" autofocus placeholder="Copy link to your instagram page and post here">
    @error('instagram')
        <span class="invalid-feedback" role="alert">
            <strong class="has-text-danger">{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>

<div class="field">
  <label class="label">Facebook</label>
  <div class="control">
    <input class="input @error('facebook') is-invalid @enderror"  name="facebook" type="text" value="@foreach ($name as $uu){{ $uu->facebook }}@endforeach" autocomplete="instagram" autofocus placeholder="Copy link to your facebook page and post here">
    @error('facebook')
        <span class="invalid-feedback" role="alert">
            <strong class="has-text-danger">{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>

<div class="field">
  <label class="label">Twitter</label>
  <div class="control">
    <input class="input @error('twitter') is-invalid @enderror"  name="twitter" type="text" value="@foreach ($name as $uu){{ $uu->twitter }}@endforeach" autocomplete="twitter" autofocus placeholder="Copy link to your twitter page and post here">
    @error('twitter')
        <span class="invalid-feedback" role="alert">
            <strong class="has-text-danger">{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>

<div class="field">
  <label class="label">Address</label>
  <div class="control">
    <input class="input @error('address') is-invalid @enderror"  name="address" type="text" value="@foreach ($name as $uu){{ $uu->address }}@endforeach" autocomplete="twitter" autofocus placeholder="The region from which your business operates. Eg. Accra, Tema">
    @error('address')
        <span class="invalid-feedback" role="alert">
            <strong class="has-text-danger">{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>


<div class="field">
  <label class="label">Banner Message</label>
  <div class="control">
    <textarea class="textarea @error('message1') is-invalid @enderror" name="message1" type="text" autocomplete="message1" autofocus placeholder="This message appears on the top banner of your business. Could be an alert for customers etc.">@foreach ($name as $uu){{ $uu->message }}@endforeach</textarea>
    @error('message1')
        <span class="invalid-feedback" role="alert">
            <strong class="has-text-danger">{{ $message }}</strong>
        </span>
    @enderror
  </div>
</div>



<div class="field is-grouped">
  <div class="control">
    <button type="submit" class="button is-link">Update</button>
  </div>
</div>
</form>
<hr>
@if(session()->get('message3'))
    <div class="notification is-success is-light subtitle is-4">
      <button class="delete"></button>
       {{ session()->get('message3') }}
    </div>
@endif
<hr>
<div class="field is-grouped">
  <div class="control">
    <a href="logo" class="button is-warning">Update your business logo</a>
    <a href="messages" class="button is-success">See customer messages</a>
    <a href="flyers" class="button is-primary">Upload Images</a>
    <a class="button is-light is-info" href="{{ route('logout') }}"
    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
       {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
</div>
</div>
</div>
</section>

@endsection
