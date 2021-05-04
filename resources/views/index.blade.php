@extends('layouts.template')

@section('css')
<style>
    :root {
      --site-primary: #6366f1;
      --site-secondary: #e0e7ff;
      --site-btn-hover: ;
    }
    * {
      font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
        "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif,
        "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol",
        "Noto Color Emoji";
    }
    nav {
      height: 92px;
    }
    .logo {
      height: 60px;
    }
    .color-input {
      height: 20px;
      width: 20px;
    }
    .feedback-form {
      right: 0;
      top: 0;
    }
    .google-map-wrapper {
      height: 100vh;
    }
    .bg-site-primary {
      background-color: var(--site-primary) !important;
    }
    .bg-site-secondary {
      background-color: var(--site-secondary) !important;
    }
    .btn-site-primary {
      background-color: var(--site-primary) !important;
      color: white;
    }
    .btn-site-primary:hover {
      background-color: #4f46e5 !important;
      color: white;
    }
    .text-primary {
      color: var(--site-primary) !important;
    }
    .site-hr {
      border: 2px solid var(--site-primary);
      background-color: var(--site-primary);
      border-radius: 10px;
      height: 0;
      width: 75px;
    }
    .hot-selling .ranking > img,
    .hot-selling .sharing > img {
      width: 20px;
      height: 20px;
    }
    .google-map-wrapper > .form-wrapper {
      top: 0;
      right: 0;
    }
    .google-map-wrapper > iframe {
      filter: grayscale(100%) opacity(0.4) contrast(1.2);
    }
  </style>
@endsection

@section('main')
<main>
    <section class="pb-5 mb-5">
      <div
        id="carouselExampleIndicators"
        class="carousel slide"
        data-ride="carousel"
      >
        <ol class="carousel-indicators">
          <li
            data-target="#carouselExampleIndicators"
            data-slide-to="0"
            class="active"
          ></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="https://via.placeholder.com/1920x1080"
              class="d-block w-100"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              src="https://via.placeholder.com/1920x1080"
              class="d-block w-100"
              alt="..."
            />
          </div>
          <div class="carousel-item">
            <img
              src="https://via.placeholder.com/1920x1080"
              class="d-block w-100"
              alt="..."
            />
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#carouselExampleIndicators"
          role="button"
          data-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>
    <section class="py-5 mb-5">
      <div class="container text-center">
        <div class="row mb-5">
          <div class="col">
            <h2 class="mb-3">Raw Denim Heirloom Man Braid</h2>
            <p class="mx-5 px-5 mb-3">
              Blue bottle crucifix vinyl post-ironic four dollar toast vegan
              taxidermy. Gastropub indxgo juice poutine, ramps microdosing
              banh mi pug.
            </p>
            <hr class="site-hr" />
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-12 col-md-4 mb-5 mb-md-0">
            <div class="mb-3">
              <div
                class="bg-site-secondary d-inline-block rounded-circle p-4"
              >
                <img src="imgs/svg_1.svg" alt="" />
              </div>
            </div>
            <h5 class="mb-3">Shooting Stars</h5>
            <p>
              Blue bottle crucifix vinyl post-ironic four dollar toast vegan
              taxidermy. Gastropub indxgo juice poutine, ramps microdosing
              banh mi pug VHS try-hard.
            </p>
            <a href="#">Learn More </a>
          </div>
          <div class="col-12 col-md-4 mb-5 mb-md-0">
            <div class="mb-3">
              <div
                class="bg-site-secondary d-inline-block rounded-circle p-4"
              >
                <img src="imgs/svg_2.svg" alt="" />
              </div>
            </div>
            <h5 class="mb-3">The Catalyzer</h5>
            <p>
              Blue bottle crucifix vinyl post-ironic four dollar toast vegan
              taxidermy. Gastropub indxgo juice poutine, ramps microdosing
              banh mi pug VHS try-hard.
            </p>
            <a href="#">Learn More</a>
          </div>
          <div class="col-12 col-md-4 mb-5 mb-md-0">
            <div class="mb-3">
              <div
                class="bg-site-secondary d-inline-block rounded-circle p-4"
              >
                <img src="imgs/svg_3.svg" alt="" />
              </div>
            </div>
            <h5 class="mb-3">Neptune</h5>
            <p>
              Blue bottle crucifix vinyl post-ironic four dollar toast vegan
              taxidermy. Gastropub indxgo juice poutine, ramps microdosing
              banh mi pug VHS try-hard.
            </p>
            <a href="#">Learn More</a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button class="btn btn-site-primary">Button</button>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5 mb-5">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 col-lg-4 mb-4 mb-lg-0">
            <h2>Master Cleanse Reliac Heirloom</h2>
          </div>
          <div class="col-12 col-lg-8">
            <p>
              Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical
              gentrify, subway tile poke farm-to-table. Franzen you probably
              haven't heard of them man bun deep jianbing selfies heirloom.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="row">
              <div class="col-6">
                <img
                  class="w-100"
                  src="https://dummyimage.com/500x300"
                  alt=""
                />
              </div>
              <div class="col-6">
                <img
                  class="w-100"
                  src="https://dummyimage.com/500x300"
                  alt=""
                />
              </div>
              <div class="col-12 mt-4">
                <img
                  class="w-100"
                  src="https://dummyimage.com/600x360"
                  alt=""
                />
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="row">
              <div class="col-12 mb-4">
                <img
                  class="w-100"
                  src="https://dummyimage.com/600x360"
                  alt=""
                />
              </div>
              <div class="col-6">
                <img
                  class="w-100"
                  src="https://dummyimage.com/500x300"
                  alt=""
                />
              </div>
              <div class="col-6">
                <img
                  class="w-100"
                  src="https://dummyimage.com/500x300"
                  alt=""
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5 mb-5">
      <div class="container text-center">
        <div class="row mb-5">
          <div class="col">
            <h2>Pricing</h2>
            <p>
              Banh mi cornhole echo park skateboard authentic crucifix neutra
              tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon
              twee
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th>Plan</th>
                  <th>Speed</th>
                  <th>Storage</th>
                  <th>Price</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>Start</th>
                  <td>5 Mb/s</td>
                  <td>15 GB</td>
                  <td>Free</td>
                  <td>
                    <input type="radio" name="plan" id="" />
                  </td>
                </tr>
                <tr>
                  <th>Pro</th>
                  <td>25 Mb/s</td>
                  <td>25 GB</td>
                  <td>$24</td>
                  <td>
                    <input type="radio" name="plan" id="" />
                  </td>
                </tr>
                <tr>
                  <th>Business</th>
                  <td>36 Mb/s</td>
                  <td>40 GB</td>
                  <td>$50</td>
                  <td>
                    <input type="radio" name="plan" id="" />
                  </td>
                </tr>
                <tr>
                  <th>Exclusive</th>
                  <td>48 Mb/s</td>
                  <td>120 GB</td>
                  <td>$72</td>
                  <td>
                    <input type="radio" name="plan" id="" />
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td>
                    <a href="#">Learn More</a>
                  </td>
                  <td colspan="3"></td>
                  <td>
                    <button class="btn btn-site-primary">Button</button>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-6 mb-4 mb-lg-0">
            <h2>Pitchfork Kickstarter Taxidermy</h2>
            <hr class="site-hr m-0" />
          </div>
          <div class="col-12 col-lg-6">
            <p>
              Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical
              gentrify, subway tile poke farm-to-table. Franzen you probably
              haven't heard of them man bun deep jianbing selfies heirloom
              prism food truck ugh squid celiac humblebrag.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-6 col-xl-3 mb-5 mb-xl-0">
            <div class="card p-4 bg-light border-light">
              <img
                src="https://dummyimage.com/720x400"
                class="card-img-top rounded"
                alt="..."
              />
              <div class="card-body px-0">
                <small class="card-subtitle mb-2 text-primary"
                  >SUBTITLE</small
                >
                <h5 class="card-title">Chichen Itza</h5>
                <p class="text-secondary">
                  Fingerstache flexitarian street art 8-bit waistcoat.
                  Distillery hexagon disrupt edison bulbche.
                </p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-xl-3 mb-5 mb-xl-0">
            <div class="card p-4 bg-light border-light">
              <img
                src="https://dummyimage.com/720x400"
                class="card-img-top rounded"
                alt="..."
              />
              <div class="card-body px-0">
                <small class="card-subtitle mb-2 text-primary"
                  >SUBTITLE</small
                >
                <h5 class="card-title">Chichen Itza</h5>
                <p class="text-secondary">
                  Fingerstache flexitarian street art 8-bit waistcoat.
                  Distillery hexagon disrupt edison bulbche.
                </p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-xl-3 mb-5 mb-xl-0">
            <div class="card p-4 bg-light border-light">
              <img
                src="https://dummyimage.com/720x400"
                class="card-img-top rounded"
                alt="..."
              />
              <div class="card-body px-0">
                <small class="card-subtitle mb-2 text-primary"
                  >SUBTITLE</small
                >
                <h5 class="card-title">Chichen Itza</h5>
                <p class="text-secondary">
                  Fingerstache flexitarian street art 8-bit waistcoat.
                  Distillery hexagon disrupt edison bulbche.
                </p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-xl-3 mb-5 mb-xl-0">
            <div class="card p-4 bg-light border-light">
              <img
                src="https://dummyimage.com/720x400"
                class="card-img-top rounded"
                alt="..."
              />
              <div class="card-body px-0">
                <small class="card-subtitle mb-2 text-primary"
                  >SUBTITLE</small
                >
                <h5 class="card-title">Chichen Itza</h5>
                <p class="text-secondary">
                  Fingerstache flexitarian street art 8-bit waistcoat.
                  Distillery hexagon disrupt edison bulbche.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5 mb-5">
      <div class="container px-lg-5">
        <div class="row px-lg-5">
          <div class="col-12">
            <div class="row align-items-center justify-content-center">
              <div class="col-12 col-md-3 text-center">
                <div>
                  <div
                    class="bg-site-secondary d-inline-block rounded-circle p-3 p-md-4 p-lg-5 mb-5 mb-md-0"
                  >
                    <img src="imgs/svg_1_large.svg" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-9 text-center text-md-left">
                <h5>Shooting Stars</h5>
                <p>
                  Blue bottle crucifix vinyl post-ironic four dollar toast
                  vegan taxidermy. Gastropub indxgo juice poutine.
                </p>
                <a href="#">Learn More</a>
              </div>
            </div>
            <hr class="my-5" />
          </div>
          <div class="col-12">
            <div class="row align-items-center flex-row flex-md-row-reverse">
              <div class="col-12 col-md-3 text-center">
                <div>
                  <div
                    class="bg-site-secondary d-inline-block rounded-circle p-3 p-md-4 p-lg-5 mb-5 mb-md-0"
                  >
                    <img src="imgs/svg_2_large.svg" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-9 text-center text-md-left">
                <h5>The Catalyzer</h5>
                <p>
                  Blue bottle crucifix vinyl post-ironic four dollar toast
                  vegan taxidermy. Gastropub indxgo juice poutine.
                </p>
                <a href="#">Learn More</a>
              </div>
            </div>
            <hr class="my-5" />
          </div>
          <div class="col-12 mb-5">
            <div class="row align-items-center">
              <div class="col-12 col-md-3 text-center">
                <div>
                  <div
                    class="bg-site-secondary d-inline-block rounded-circle p-3 p-md-4 p-lg-5 mb-5 mb-md-0"
                  >
                    <img src="imgs/svg_3_large.svg" alt="" />
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-9 text-center text-md-left">
                <h5 class="">The 400 Blows</h5>
                <p>
                  Blue bottle crucifix vinyl post-ironic four dollar toast
                  vegan taxidermy. Gastropub indxgo juice poutine.
                </p>
                <a href="#">Learn More</a>
              </div>
            </div>
          </div>
          <div class="col-12 text-center">
            <button class="btn btn-site-primary">Button</button>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-6 col-xl-3 mb-4">
            <img
              class="w-100 mb-2 rounded"
              src="https://dummyimage.com/420x260"
              alt=""
            />
            <small class="text-muted">CATEGORY</small>
            <h6 class="my-2">The Catalyzer</h6>
            <span>$16.00</span>
          </div>
          <div class="col-12 col-md-6 col-xl-3 mb-4">
            <img
              class="w-100 mb-2 rounded"
              src="https://dummyimage.com/420x260"
              alt=""
            />
            <small class="text-muted">CATEGORY</small>
            <h6 class="my-2">The Catalyzer</h6>
            <span>$16.00</span>
          </div>
          <div class="col-12 col-md-6 col-xl-3 mb-4">
            <img
              class="w-100 mb-2 rounded"
              src="https://dummyimage.com/420x260"
              alt=""
            />
            <small class="text-muted">CATEGORY</small>
            <h6 class="my-2">The Catalyzer</h6>
            <span>$16.00</span>
          </div>
          <div class="col-12 col-md-6 col-xl-3 mb-4">
            <img
              class="w-100 mb-2 rounded"
              src="https://dummyimage.com/420x260"
              alt=""
            />
            <small class="text-muted">CATEGORY</small>
            <h6 class="my-2">The Catalyzer</h6>
            <span>$16.00</span>
          </div>
          <div class="col-12 col-md-6 col-xl-3 mb-4">
            <img
              class="w-100 mb-2 rounded"
              src="https://dummyimage.com/420x260"
              alt=""
            />
            <small class="text-muted">CATEGORY</small>
            <h6 class="my-2">The Catalyzer</h6>
            <span>$16.00</span>
          </div>
          <div class="col-12 col-md-6 col-xl-3 mb-4">
            <img
              class="w-100 mb-2 rounded"
              src="https://dummyimage.com/420x260"
              alt=""
            />
            <small class="text-muted">CATEGORY</small>
            <h6 class="my-2">The Catalyzer</h6>
            <span>$16.00</span>
          </div>
          <div class="col-12 col-md-6 col-xl-3 mb-4">
            <img
              class="w-100 mb-2 rounded"
              src="https://dummyimage.com/420x260"
              alt=""
            />
            <small class="text-muted">CATEGORY</small>
            <h6 class="my-2">The Catalyzer</h6>
            <span>$16.00</span>
          </div>
          <div class="col-12 col-md-6 col-xl-3 mb-4">
            <img
              class="w-100 mb-2 rounded"
              src="https://dummyimage.com/420x260"
              alt=""
            />
            <small class="text-muted">CATEGORY</small>
            <h6 class="my-2">The Catalyzer</h6>
            <span>$16.00</span>
          </div>
        </div>
      </div>
    </section>
    <section class="hot-selling py-5 mb-5">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-6 mb-4 mb-lg-0">
            <img
              class="w-100 rounded"
              src="https://dummyimage.com/400x400"
              alt=""
            />
          </div>
          <div class="col-12 col-lg-6">
            <div class="row">
              <div class="col-12">
                <h6 class="text-secondary">BRAND NAME</h6>
              </div>
              <div class="col-12">
                <h1>The Catcher in the Rye</h1>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col d-flex">
                <div class="ranking mr-3">
                  <img src="imgs/star.svg" alt="" />
                  <img src="imgs/star.svg" alt="" />
                  <img src="imgs/star.svg" alt="" />
                  <img src="imgs/star.svg" alt="" />
                  <img src="imgs/star_empty.svg" alt="" />
                </div>
                <div class="mr-3">4 Reviews</div>
                <div class="sharing">
                  <img src="imgs/Facebook.svg" alt="" />
                  <img src="imgs/Twitter.svg" alt="" />
                  <img src="imgs/Line.svg" alt="" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <p class="py-3">
                  Fam locavore kickstarter distillery. Mixtape chillwave
                  tumeric sriracha taximy chia microdosing tilde DIY. XOXO fam
                  indxgo juiceramps cornhole raw denim forage brooklyn.
                  Everyday carry +1 seitan poutine tumeric. Gastropub blue
                  bottle austin listicle pour-over, neutra jean shorts keytar
                  banjo tattooed umami cardigan.
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group d-flex align-items-center h-100">
                  <label class="mb-0 mr-3" for="size">Color</label>
                  <input
                    class="color-input rounded-circle bg-light border-secondary mr-1"
                    type="button"
                  />
                  <input
                    class="color-input rounded-circle bg-dark border-secondary mr-1"
                    type="button"
                  />
                  <input
                    class="color-input rounded-circle bg-site-secondary border-secondary"
                    type="button"
                  />
                </div>
              </div>
              <div class="col">
                <div class="form-group d-flex align-items-center mb-0">
                  <label class="mb-0 mr-3" for="size">Size</label>
                  <select class="form-control" id="size">
                    <option>SM</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                  </select>
                </div>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col">
                <span class="h4">$58.00</span>
              </div>
              <div class="col text-right">
                <button class="btn btn-site-primary">Button</button>
                <button
                  class="btn btn-secondary rounded-circle p-1 bg-light border-light"
                >
                  <img src="imgs/heart.svg" alt="" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="google-map-wrapper position-relative">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d25006.38429432156!2d27.135513!3d38.423032!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14bbd862a762cacd%3A0x628cbba1a59ce8fe!2zxLB6bWlyLCBUdXJrZXk!5e0!3m2!1sen!2sus!4v1617956498082!5m2!1sen!2sus"
          width="100%"
          height="100%"
          style="border: 0"
          loading="lazy"
        ></iframe>
        <div class="position-absolute container-fluid form-wrapper py-5">
          <div class="row justify-content-center justify-content-lg-end">
            <div class="col-12 col-md-6 col-xl-4">
              <div class="bg-white feedback-form px-4 py-5 rounded">
                <form>
                  <h5>Feedback</h5>
                  <p>
                    Post-ironic portland shabby chic echo park, banjo fashion
                    axe
                  </p>
                  <div class="form-group">
                    <label for="form_email">Email address</label>
                    <input
                      type="email"
                      class="form-control"
                      id="form_email"
                    />
                  </div>
                  <div class="form-group">
                    <label for="form_message">Message</label>
                    <textarea
                      class="form-control"
                      id="form_message"
                      rows="5"
                    ></textarea>
                  </div>
                  <button
                    type="submit"
                    class="btn btn-site-primary btn-block mb-2"
                  >
                    Button
                  </button>
                  <small class="text-muted"
                    >Chicharrones blog helvetica normcore iceland tousled
                    brook viral artisan.
                  </small>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@section('js')
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"
    ></script>
@endsection
