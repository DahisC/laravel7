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
                <form method="POST" action="{{ route('cart.check3') }}" class="order-form bg-light p-5 mx-auto rounded">
                    @csrf
                    <!-- 進度條 -->
                    <h3 class="font-weight-bold">購物車</h3>
                    <div class="order-progression text-center d-flex px-5">
                        <div class="col-1 px-0 d-flex justify-content-center py-4">
                            <div class="order-progression-steps step-1 done">1</div>
                        </div>
                        <div class="px-1 col px-0 d-flex flex-column justify-content-center">
                            <div class="progress" style="height: 10px">
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-1 px-0 d-flex justify-content-center py-4">
                            <div class="order-progression-steps step-2 done">2</div>
                        </div>
                        <div class="px-1 col px-0 d-flex flex-column justify-content-center">
                            <div class="progress" style="height: 10px">
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-1 px-0 d-flex justify-content-center py-4">
                            <div class="order-progression-steps step-3 done">3</div>
                        </div>
                        <div class="px-1 col px-0 d-flex flex-column justify-content-center">
                            <div class="progress" style="height: 10px">
                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-1 px-0 d-flex justify-content-center py-4">
                            <div class="order-progression-steps step-4">4</div>
                        </div>
                    </div>
                    <hr />
                    <!-- 寄送資料 -->
                    <h4 class="mb-5">寄送資料</h4>
                    <div class="px-3 h5">
                        <div class="form-group">
                            <label for="name">姓名</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="王小明" />
                        </div>
                        <div class="form-group">
                            <label for="phone">電話</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="0912345678" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="abc123@gmail.com" />
                        </div>
                        <div class="form-group">
                            <label for="address">地址</label>
                            <div id="city-selector-set" class="form-row mb-3">
                                <div class="col">
                                    <select id="county" name="county" type="text" class="form-control"
                                        placeholder="城市"></select>
                                </div>
                                <div class="col">
                                    <select id="district" name="district" type="text" class="form-control"
                                        placeholder="郵遞區號"></select>
                                    <input id="zipcode" name="zipcode" type="text" class="form-control"
                                        placeholder="郵遞區號" readonly hidden />
                                </div>
                            </div>
                            <input id="address" name="address" type="text" class="form-control" placeholder="地址" />
                        </div>
                    </div>
                    <hr />
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
                        <a class="btn btn-site-primary px-5 py-2" href="{{ route('cart.step2') }}">
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

@section('js')
<script>
    new TwCitySelector({
        el: '#city-selector-set',
        elCounty: '#county', // 在 el 裡查找 element
        elDistrict: '#district', // 在 el 裡查找 element
        elZipcode: '#zipcode' // 在 el 裡查找 element
    });

</script>
@endsection
