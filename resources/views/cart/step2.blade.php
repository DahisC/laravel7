@extends('layouts.template')

@section('css')
  <style>
    .order-form img {
      width: 60px;
    }

    .order-progression-steps {
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      position: relative;
      flex-shrink: 0;
      background-color: #f3f4f6;
      color: #4b5563;
    }

    .order-progression-steps.done {
      background-color: #10b981;
      color: white;
    }

    .order-progression-steps:after {
      color: black;
      position: absolute;
      top: 45px;
      word-break: keep-all;
    }

    .order-progression-steps.step-1::after {
      content: "確認購物車";
    }

    .order-progression-steps.step-2::after {
      content: "付款與運送方式";
    }

    .order-progression-steps.step-3::after {
      content: "填寫資料";
    }

    .order-progression-steps.step-4::after {
      content: "完成訂購";
    }

    .order-progression .progress-bar {
      background-color: #6ee7b7 !important;
    }

    @media (max-width: 768px) {
      .order-progression-steps {
        height: 30px;
        width: 30px;
      }

      .order-progression-steps:after {
        font-size: 0.8em;
      }
    }

    @media (max-width: 576px) {
      .order-progression-steps {
        height: 25px;
        width: 25px;
      }

      .order-progression-steps:after {
        font-size: 0.7em;
      }
    }

  </style>
@endsection

@section('main')
  <section class="bg-secondary">
    <div class="container-fluid py-5">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-11 col-xl-10">
          <form method="POST" action="{{ route('cart.check2') }}" class="order-form bg-light p-5 mx-auto rounded">
            @csrf
            <!-- 進度條 -->
            <h3 class="font-weight-bold">購物車</h3>
            <div class="order-progression text-center d-flex px-5">
              <div class="col-1 px-0 d-flex justify-content-center py-4">
                <div class="order-progression-steps step-1 done">1</div>
              </div>
              <div class="px-1 col px-0 d-flex flex-column justify-content-center">
                <div class="progress" style="height: 10px">
                  <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0"
                       aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-1 px-0 d-flex justify-content-center py-4">
                <div class="order-progression-steps step-2 done">2</div>
              </div>
              <div class="px-1 col px-0 d-flex flex-column justify-content-center">
                <div class="progress" style="height: 10px">
                  <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                       aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-1 px-0 d-flex justify-content-center py-4">
                <div class="order-progression-steps step-3">3</div>
              </div>
              <div class="px-1 col px-0 d-flex flex-column justify-content-center">
                <div class="progress" style="height: 10px">
                  <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0"
                       aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-1 px-0 d-flex justify-content-center py-4">
                <div class="order-progression-steps step-4">4</div>
              </div>
            </div>
            <hr />
            <!-- 付款方式 -->
            @php
              $payment_method = Session::get('payment_method');
            @endphp
            <h4 class="mb-5">付款方式</h4>
            <div class="px-3 h5">
              <div class="form-check pl-0 py-2">
                <input id="payment-method__credit-card" type="radio" name="payment_method" value="credit_card" required
                       @if ($payment_method == 'credit_card') checked @endif>
                <label class="mb-0" for="payment-method__credit-card">信用卡付款</label>
              </div>
              <hr />
              <div class="form-check pl-0 py-2">
                <input id="payment-method__atm" type="radio" name="payment_method" value="atm" required @if ($payment_method == 'atm') checked @endif />
                <label class="mb-0" for="payment-method__atm">網路 ATM</label>
              </div>
              <hr />
              <div class="form-check pl-0 py-2">
                <input id="payment-method__cvs-code" type="radio" name="payment_method" value="cvs_code" required @if ($payment_method == 'cvs_code') checked @endif />
                <label class="mb-0" for="payment-method__cvs-code">超商代碼</label>
              </div>
            </div>
            <hr />
            <!-- 運送方式 -->
            @php
              $logistics_method = Session::get('logistics_method');
            @endphp
            <h4 class="mb-5">運送方式</h4>
            <div class="px-3 h5">
              <div class="form-check pl-0 py-2">
                <input id="logistics-method__t-cat" type="radio" name="logistics_method" value="t_cat" required @if ($logistics_method == 't_cat') checked @endif />
                <label class="mb-0" for="logistics-method__t-cat">黑貓宅配</label>
              </div>
              <hr />
              <div class="form-check pl-0 py-2">
                <input id="logistics-method__cvs-to-cvs" type="radio" name="logistics_method" value="cvs_to_cvs" required
                       @if ($logistics_method == 'cvs_to_cvs') checked @endif />
                <label class="mb-0" for="logistics-method__cvs-to-cvs">
                  超商店到店</label>
              </div>
            </div>
            {{--  --}}
            <div class="row text-right">
              <div class="col-10">數量</div>
              <div class="col-2"><span id="_itemQuantity">24.90</span></div>
              <div class="col-10">小計</div>
              <div class="col-2">$<span id="_itemTotal">{{ \Cart::getTotal() }}</span></div>
              <div class="col-10">運費</div>
              <div class="col-2">$<span id="_shippingFee">12345</span></div>
              <div class="col-10">總計</div>
              <div class="col-2">$<span id="_total">24.90</span></div>
            </div>
            {{--  --}}
            <hr />
            <div class="d-flex justify-content-between">
              <a class="btn btn-site-primary px-5 py-2" href="{{ route('cart.index') }}">
                <i class="fa fa-arrow-left mr-1"></i>
                返回購物
              </a>
              {{-- <a href="{{ route('cart.step3') }}" class="btn btn-site-primary px-5 py-2">填寫個人資料</a> --}}
              <button type="submit" class="btn btn-site-primary px-5 py-2">填寫個人資料</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <form id="go_step2" action="{{ route('cart.step2') }}" method="POST">
    @csrf
  </form>
@endsection
