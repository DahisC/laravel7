@extends('layouts.admin_dashboard')

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">{{ $action }}</h1>
    <hr />
    <form class="user" action="{{ $action == "Create" ? route('admin.product.store') : route('admin.product.update', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($action == "Create" ? "POST" : 'PUT')
        <div class="d-flex">
            <div class="form-group mr-3 w-100">
                <label for="name">Name</label>
                <input id="name" type="text" class="form-control form-control-user" name="name" value="{{ $product->title ?? 'モクロー ぬいぐるみ' }}" required autofocus placeholder="Name">
            </div>
            <div class="form-group w-100">
                <label for="type_id">Type</label>
                <select name="type_id" id="type_id" class="form-control form-control-user p-0" style="height: 50px; text-align-last: center;">
                    @foreach ($productTypeList as $productType)
                    <option value="{{ $productType->id }}" @if (isset($product) && $product->type_id == $productType->id)
                        selected
                    @endif>
                        {{ $productType->type }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="date">Price</label>
            <input id="price" type="number" class="form-control form-control-user" name="price" value="{{ $product->price ?? '2000' }}" required placeholder="$ Price">
        </div>
        <div class="form-group">
            <label for="image">Images</label>
            <div><small><i>已上傳的圖片</i></small></div>
            <div id="uploaded_images_wrapper" class="d-flex flex-wrap">
                @if (isset($product))
                    @foreach ($product->images as $image)
                        <img style="height: 200px; max-width: 100%;" class="d-block mx-auto my-3 rounded" src="{{ $image->url }}" data-id="{{ $image->id }}"/>
                    @endforeach
                @endif
            </div>
            <hr />
            <div><small><i>未上傳的圖片</i></small></div>
            <div id="preview_images_wrapper" class="d-flex flex-wrap"></div>
            {{-- <img id="preview_img" style="height: 150px;" class="d-block mx-auto my-3 rounded" src="{{ $product->images ?? 'https://images-na.ssl-images-amazon.com/images/I/81FJqdi%2BJNL._AC_SL1500_.jpg' }}"> --}}
            {{-- <input id="input_img" type="text" class="form-control form-control-user" name="img" value="{{ $product->img ?? 'https://i.ytimg.com/vi/UjLnvXpkq68/maxresdefault.jpg' }}" required placeholder="Image" oninput="img_preview.setAttribute('src', this.value);"> --}}
            <div class="d-flex">
                {{-- <input id="input_img" type="text" class="form-control form-control-user mr-3" name="img" value="{{ $product->img ?? 'https://images-na.ssl-images-amazon.com/images/I/81FJqdi%2BJNL._AC_SL1500_.jpg' }}" required placeholder="Image" oninput="preview_img.setAttribute('src', this.value);"> --}}
                <button type="button" class="btn-block btn btn-primary btn-user px-5 d-flex align-items-center justify-content-center" onclick="input_images.click();">
                    <i class="fas fa-upload mr-2"></i>
                    Upload
                </button>
                <input hidden id="input_images" name="images[]" type="file" accept="image/*"
                    onchange="previewImages(this.files);" multiple />
            </div>
            <div class="text-right">
                <small class="text-right"><span id="uploaded_images_counter">0</span> images has been selected.</small>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Content</label>
            <textarea id="description" class="form-control" rows="10" name="description">{{ $product->description ?? '
                ポケモンセンターオリジナル商品に、モクローのぬいぐるみが登場!

                ★ポケモンセンターオリジナルぬいぐるみの見どころ紹介！
                ＜ポイント1＞ポケモンセンターでしか手に入らない！
                ポケモンオフィシャルショップ ポケモンセンターのオリジナルグッズ！
                ＜ポイント2＞豊富なラインナップ展開
                ゲームやアニメで大活躍のポケモンたちが勢揃い！
                ＜ポイント3＞安心の品質
                自社開発のオリジナルグッズなので、安心してお手にとっていただけます。
                ＜ポイント4＞こだわりのクオリティ
                ポケモン1匹1匹の特徴に合わせて、細部まで忠実に再現！' }}
            </textarea>
          </div>
        <div class="d-flex justify-content-end">
            <a href="/admin/product" class="btn btn-secondary btn-user px-5 mr-3">
                Cancel
            </a>
            <button type="submit" class="btn btn-success btn-user px-5">
                {{ $action }}
            </button>
        </div>
    </form>
@endsection

@section('js')
    <script>
        uploaded_images_wrapper.addEventListener('click', e => {
            const imageId = e.target.dataset.id;
            deleteImage(imageId);
        });

        async function previewImages(files) {
            uploaded_images_counter.textContent = files.length;
            preview_images_wrapper.innerHTML = '';
            const imagePromises = [...files].map(f => previewImage(f));
            const previewImages = await Promise.all(imagePromises);
            previewImages.forEach(image => {
                preview_images_wrapper.innerHTML += `
                    <img style="height: 200px; max-width: 100%;" class="d-block mx-auto my-3 rounded" src="${image}" }}">
                `
            });;
            function previewImage(file, cb) {
                return new Promise((resolve) => {
                    const r = new FileReader();
                    r.readAsDataURL(file);
                    r.onload = function() {
                        resolve(this.result);
                    }
                })
            }
        }

        async function deleteImage(imageId) {
            const token = '{{ csrf_token() }}';
            const url = "{{ route('admin.product.image.destroy', ['image' => ':id']) }}";

            if (confirm('刪除圖片？')) {
                const result = await fetch(url.replace(':id', imageId), {
                    method: 'DELETE',
                    headers: {
                        // 'Content-Type': 'application/json',
                        "X-CSRF-Token": token
                    }
                });
                const images = await result.json();
                renderImage(images);
            }

            function renderImage(images) {
                uploaded_images_wrapper.innerHTML = '';
                images.forEach(image => {
                    uploaded_images_wrapper.innerHTML += `
                        <img style="height: 200px; max-width: 100%;" class="d-block mx-auto my-3 rounded" src="${image.url}" data-id="${image.id}"}}">
                    `
                })
            }
        }
    </script>
@endsection
