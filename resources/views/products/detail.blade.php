@extends('layouts.template')

@section('css')
@endsection

@section('main')
  <section class="bg-secondary">
    <div class="container py-5">
      <div class="row">
        <div class="col-12">
          <h5>{{ $product->name }}</h5>
          <p>{{ $product->description }}</p>
        </div>
      </div>
    </div>
  </section>
@endsection
