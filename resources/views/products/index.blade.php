@extends('layouts.template')

@section('css')
  <style>
    .card-img-top {
      object-fit: cover;
      width: 100%;
      height: 200px;
    }

    .card {
      height: 400px;
    }

  </style>
@endsection

@section('main')
  <section class="bg-secondary">
    <div class="container py-5">
      <div class="row mb-3">
        @foreach ($productList as $p)
          <div class="col-3">
            <div class="card">
              <img class="card-img-top" src="{{ $p->images->take(1)[0]->url }}" alt="Card image cap">
              <div class="card-body d-flex flex-column justify-content-between overflow-hidden">
                <h5 class="card-title d-flex justify-content-between">
                  <span class="text-nowrap text-truncate overflow-hidden">{{ $p->name }}</span>
                  <span class="text-nowrap">$ {{ $p->price }}</span>
                </h5>
                <p class="card-text overflow-hidden">{{ $p->description }}</p>
                <div class="d-flex justify-content-between">
                  <a class="btn btn-site-primary" href="{{ route('products.show', ['product' => $p->id]) }}"
                    class="btn btn-primary">去看看！</a>
                  <a class="btn_addToCart btn btn-site-primary" href="#" class="btn btn-primary"
                    onclick="addToCart({{ $p->id }})">放進車車</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="row mb-3">
        <div class="col-12">
          <a href="#" class="btn btn-danger" onclick="clearCart()">清空車車</a>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js')
  <script>
    async function addToCart(productId) {
      try {
        await fetch('{{ route('api.cart.add') }}', {
          method: 'POST',
          headers: {
            'content-type': 'application/json'
          },
          body: JSON.stringify({
            productId
          })
        })
        Swal.fire({
          title: '商品已加入購物車',
          text: '你很棒！<3',
          icon: 'success',
          confirmButtonText: '繼續買'
        })
      } catch (err) {

      }
    }

    async function clearCart(productId) {
      try {
        await fetch('{{ route('api.cart.clear') }}', {
          method: 'DELETE',
        })
        Swal.fire({
          title: '清空購物車',
          text: '不！:(',
          icon: 'success',
          confirmButtonText: '繼續買'
        })
      } catch (err) {

      }
    }

  </script>
@endsection
