<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="@stack('html-class')">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @foreach ($logos as $logo)
    <link rel="icon" href="{{ $logo->logo }}" sizes="192x192" type="image/x-icon">
    @endforeach
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    {{-- Scripts --}}
    @stack('head-scripts')

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @stack('head-after')
</head>
<body>


    <nav class="navbar is-transparent" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="/">
        @if(count($logos) > 0)
        @foreach ($logos as $logo)
        <img src="{{ $logo->logo }}" width="112" height="28">
        @endforeach
        @else
        @foreach ($name as $uu)
            <strong class="has-text-primary">{{ $uu->shopname }}</strong>
          @endforeach
        @endif
      </a>

      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="/">
          Home
        </a>
      </div>

      <div class="navbar-end">
        <a class="navbar-item" href="about-us">
          About Us
        </a>

        <a class="navbar-item" href="contact-us">
          Contact Us
        </a>
      </div>
    </div>
  </nav>
  <script>
  document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

  // Add a click event on each of them
  $navbarBurgers.forEach( el => {
  el.addEventListener('click', () => {

  // Get the target from the "data-target" attribute
  const target = el.dataset.target;
  const $target = document.getElementById(target);

  // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
  el.classList.toggle('is-active');
  $target.classList.toggle('is-active');

  });
  });
  }

  });
  </script>
  <script>
  document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
  });
  </script>
  <div id="app">

      @yield('content')

  </div>
</section>

  <footer class="footer">
    <div class="container">
      <div class="level">
        <div class="level-left">
          @foreach ($name as $uu)
          <div class="level-item"><a class="title has-text-primary is-4" href="/">{{ $uu->shopname }}</a></div>
          @endforeach
        </div>
        <div class="level-right"><a class="level-item" href="about-us">About</a><a class="level-item" href="contact-us">Contact</a><a class="level-item" href="terms">Terms & Conditions</a><a class="level-item" href="cookies">Cookie Policy</a></div>
      </div>
      <hr>
      <div class="columns">
        <div class="column">
          @foreach ($name as $uu)
          <div class="buttons"><a class="button" target="_blank" href="{{ $uu->twitter }}"><i class="fa fa-twitter"></i> </a><a class="button" target="_blank" href="{{ $uu->facebook }}"><i class="fa fa-facebook"></i></a><a class="button" target="_blank" href="{{ $uu->instagram }}"><i class="fa fa-instagram"></i></a></div>
          @endforeach
        </div>
        <div class="column has-text-centered has-text-right-tablet">
          <a href="https://laddle.io/business" class="subtitle has-text-primary is-6">© <script>document.write(new Date().getFullYear())</script> Laddle Business. All right reserved.</a>
        </div>
      </div>
    </div>
  </footer

@stack('bottom')

</body>
</html>
