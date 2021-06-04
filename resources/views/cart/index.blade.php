@extends('layouts.template')

@section('css')
  <style>
    .order-form img {
      width: 60px;
    }

    .order-form input {
      width: 40px !important;
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
            <h4 class="mb-5">訂單明細</h4>
            <!-- 商品 -->
            <div class="d-flex align-items-center justify-content-between">
              <img class="rounded-circle mr-3" src="https://i.imgur.com/EEguU02.jpg" />
              <div class="mr-auto">
                <h6>Chicken momo</h6>
                <small class="text-muted">#41551</small>
              </div>
              <div class="input-group input-group-sm mr-3">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-secondary" type="button">
                    －
                  </button>
                </div>
                <input type="text" class="form-control text-center" value="1" />
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button">
                    ＋
                  </button>
                </div>
              </div>
              <small>$10.50</small>
            </div>
            <hr />
            <div class="d-flex justify-content-between">
              <a href="#">
                <i class="fa fa-arrow-left mr-1"></i>
                返回購物
              </a>
              <button class="btn btn-primary px-5 py-2">下一步</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
