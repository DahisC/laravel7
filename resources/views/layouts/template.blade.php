<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  {{-- reCaptcha v2 --}}
  {!! ReCaptcha::htmlScriptTagJsApi() !!}
  <style>
    :root {
      --site-primary: #6366f1;
      --site-secondary: #e0e7ff;
    }

  </style>
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  @yield('css')

</head>

<body>
  <nav class="navbar navbar-expand-md navbar-light bg-light py-3 text-center text-md-right">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img class="logo" src="{{ asset('imgs/logo.svg') }}" alt="" />
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/news">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/products">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cart">
              <i class="h4 mb-0 fas fa-shopping-cart"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/login">
              <i class="h4 mb-0 fas fa-user-circle"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main>
    @yield('main')
  </main>
  <footer>
    <div class="container-fluid p-5 text-center text-md-left">
      <div class="row">
        <div class="d-flex d-lg-block flex-column justify-content-center col-12 col-md-4 mb-5 mb-md-0">
          <h5>
            <img class="inline-block" src="{{ asset('imgs/logo_2.svg') }}" alt="" />
            數位方塊
          </h5>
          <p class="text-secondary">
            Air plant banjo lyft occupy retro adaptogen indego
          </p>
        </div>
        <div class="col-12 col-md-8">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-lg-0">
              <h6>CATEGORIES</h6>
              <div>First Link</div>
              <div>Second Link</div>
              <div>Third Link</div>
              <div>Fourth Link</div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-lg-0">
              <h6>CATEGORIES</h6>
              <div>First Link</div>
              <div>Second Link</div>
              <div>Third Link</div>
              <div>Fourth Link</div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-lg-0">
              <h6>CATEGORIES</h6>
              <div>First Link</div>
              <div>Second Link</div>
              <div>Third Link</div>
              <div>Fourth Link</div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-lg-0">
              <h6>CATEGORIES</h6>
              <div>First Link</div>
              <div>Second Link</div>
              <div>Third Link</div>
              <div>Fourth Link</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="bg-light py-3 px-5 d-flex justify-content-between">
      <p class="mb-0">
        <span class="text-muted">© 2020 Tailblocks — </span>@knyttneve
      </p>
      <div>
        <img src="{{ asset('imgs/Facebook.svg') }}" alt="" />
        <img src="{{ asset('imgs/Twitter.svg') }}" alt="" />
        <img src="{{ asset('imgs/Instagram.svg') }}" alt="" />
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  @yield('js')
  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
