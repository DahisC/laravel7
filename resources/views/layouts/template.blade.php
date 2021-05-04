<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
      integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    @yield('css')
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link disabled"
              href="#"
              tabindex="-1"
              aria-disabled="true"
              >Disabled</a
            >
          </li>
        </ul>
      </div>
    </nav>
    <main>
        @yield('main')
    </main>
    <footer>
      <div class="container-fluid p-5 text-center text-md-left">
        <div class="row">
          <div
            class="d-flex d-lg-block flex-column justify-content-center col-12 col-md-4 mb-5 mb-md-0"
          >
            <h5>
              <img class="inline-block" src="imgs/logo_2.svg" alt="" />
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
          <img src="imgs/Facebook.svg" alt="" />
          <img src="imgs/Twitter.svg" alt="" />
          <img src="imgs/Instagram.svg" alt="" />
        </div>
      </div>
    </footer>
    <!-- Scripts -->
    @yield('js')
  </body>
</html>
