@extends('layouts.template')

@section('main')
  <div class="container">
    <div class="row">
      @foreach ($productList as $p)
        <div class="col">
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ $p->images->take(1)[0]->url }}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $p->name }}</h5>
              <p class="card-text">{{ $p->description }}</p>
              <a href="{{ route('products.show', ['product' => $p->id]) }}" class="btn btn-primary">去看看！</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
