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
          <form class="order-form bg-light p-5 mx-auto rounded">
            <!-- 進度條 -->
            <h3 class="font-weight-bold">購物車</h3>
            <div class="order-progression text-center d-flex px-5">
              <div class="col-1 px-0 d-flex justify-content-center py-4">
                <div class="order-progression-steps step-1 done">1</div>
              </div>
              <div class="px-1 col px-0 d-flex flex-column justify-content-center">
                <div class="progress" style="height: 10px">
                  <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                       aria-valuemax="100"></div>
                </div>
              </div>
              <div class="col-1 px-0 d-flex justify-content-center py-4">
                <div class="order-progression-steps step-2">2</div>
              </div>
              <div class="px-1 col px-0 d-flex flex-column justify-content-center">
                <div class="progress" style="height: 10px">
                  <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0"
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
            <!-- 商品 -->
            <h4 class="mb-5">訂單明細</h4>
            <div class="row">
              @foreach ($cartItems as $cartItem)
                <div id="cartItem_{{ $cartItem->id }}"
                     class="cart-item col-12 d-flex align-items-center text-center mb-3">
                  <div class="col-1">
                    <a href="#" onclick="deleteCartItem({{ $cartItem->id }})">
                      <i class="fas fa-trash"></i>
                    </a>
                  </div>
                  <div class="col-2">
                    <img src="{{ $cartItem->model->images[0]->url }}" />
                  </div>
                  <div class="col">
                    <h6>{{ $cartItem->name }}</h6>
                    <small class="text-muted">#{{ $cartItem->id }}</small>
                  </div>
                  <div class="col">
                    <div class="input-group input-group-sm">
                      <div class="input-group-prepend" onclick="minus(this);">
                        <button class="btn btn-outline-secondary" type="button">
                          －
                        </button>
                      </div>
                      <input type="text" class="_itemQuantity form-control text-center mx-auto"
                             value="{{ $cartItem->quantity }}"
                             oninput="calculateItemTotal(this, {{ $cartItem->id }}, {{ $cartItem->price }})" />
                      <div class="input-group-append" onclick="plus(this)">
                        <button class="btn btn-outline-secondary" type="button">
                          ＋
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-1 text-right">
                    <div>$<small>{{ $cartItem->price }}</small></div>
                    <div>$<small id="_itemTotal_{{ $cartItem->id }}" class="_itemTotal">-</small></div>
                  </div>
                </div>
              @endforeach
            </div>
            <hr />
            {{--  --}}
            <div class="row text-right">
              <div class="col-10">數量</div>
              <div class="col-2"><span id="_itemQuantity">24.90</span></div>
              <div class="col-10">小計</div>
              <div class="col-2">$<span id="_itemTotal">24.90</span></div>
              <div class="col-10">運費</div>
              <div class="col-2">$<span id="_shippingFee">12345</span></div>
              <div class="col-10">總計</div>
              <div class="col-2">$<span id="_total">24.90</span></div>
            </div>
            {{--  --}}
            <hr />
            <div class="d-flex justify-content-between">
              <a class="btn btn-site-primary px-5 py-2" href="/products">
                <i class="fa fa-arrow-left mr-1"></i>
                去逛逛
              </a>
              <a href="{{ route('cart.step2') }}" class="btn btn-site-primary px-5 py-2">選擇付款與運送方式</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('js')
  <script>
    window.onload = () => {
      document.querySelectorAll(`._itemQuantity`).forEach(e => e.dispatchEvent(new Event('input')));
    }

    function minus(target) {
      target.nextElementSibling.value--;
      target.nextElementSibling.dispatchEvent(new Event('input'));
    }

    function plus(target) {
      target.previousElementSibling.value++;
      target.previousElementSibling.dispatchEvent(new Event('input'));
    }

    function calculateItemTotal(target, id, itemPrice) {
      if (target.value < 0) target.value = 0;
      document.querySelector(`#_itemTotal_${id}`).textContent = Intl.NumberFormat().format(Number(target.value) *
        itemPrice);
      updateQuantity(id, target.value);
      calculate();
    }

    function calculate() {
      calculateItemsQuantity();
      calculateItemsTotal();
      calculateFinalTotal();

      function calculateItemsTotal() {
        const itemTotalArray = document.querySelectorAll('._itemTotal');
        _itemTotal.textContent = [...itemTotalArray].reduce((a, it) => a + Number(it.textContent.replace(/,/, '')), 0);
      }

      function calculateItemsQuantity() {
        const itemQuantityArray = document.querySelectorAll('._itemQuantity');
        _itemQuantity.textContent = [...itemQuantityArray].reduce((a, iq) => a + Number(iq.value), 0);
      }

      function calculateFinalTotal() {
        _total.textContent = Number(_itemTotal.textContent) + Number(_shippingFee.textContent);
      }
    }

    async function deleteCartItem(productId) {
      //   const response = await axios.delete('{{ route('api.cart.delete', ['productId' => 2]) }}');
      const response = await axios.delete(`/api/cart/${productId}`);
      document.querySelector('#cartItem_' + response.data.productId).remove();
      calculate();
    }

    async function updateQuantity(productId, quantity) {
      await axios.patch('{{ route('api.cart.updateQuantity') }}', {
        productId,
        quantity
      });
    }

    function debounce(func, delay) {
      let timer = null;
      return function() {
        const that = this;
        const args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function() {
          func.apply(that, args)
        }, delay);
      }
    }

  </script>
@endsection
