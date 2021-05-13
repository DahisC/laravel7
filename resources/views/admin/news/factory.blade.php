@extends('layouts.admin_dashboard')

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">{{ $action }}</h1>
    <hr />
    <form class="user" action="{{ $action == "Create" ? route('admin.news.store') : route('admin.news.update', ['news' => $news->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($action == "Create" ? "POST" : 'PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input id="title" type="text" class="form-control form-control-user" name="title" value="{{ $news->title ?? '世界が癒される国産ビートメイカーDJ OKAWARIとは？' }}" required autofocus placeholder="Title">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input id="date" type="date" class="form-control form-control-user" name="date" value="{{ $news->date ?? '2021-05-01' }}" required placeholder="Date">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <img id="preview_img" class="d-block mx-auto my-3 w-50 rounded" src="{{ $news->img ?? '' }}">
            {{-- <input id="input_img" type="text" class="form-control form-control-user" name="img" value="{{ $news->img ?? 'https://i.ytimg.com/vi/UjLnvXpkq68/maxresdefault.jpg' }}" required placeholder="Image" oninput="img_preview.setAttribute('src', this.value);"> --}}
            <div class="d-flex">
                {{-- <input id="input_img" type="text" class="form-control form-control-user mr-3" name="img" value="{{ $news->img ?? 'https://i.ytimg.com/vi/UjLnvXpkq68/maxresdefault.jpg' }}" required placeholder="Image" oninput="preview_img.setAttribute('src', this.value);"> --}}
                <button type="button" class="btn-block btn btn-primary btn-user px-5 d-flex align-items-center justify-content-center" onclick="input_upload_img.click();">
                    <i class="fas fa-upload mr-2"></i>
                    Upload
                </button>
                <input hidden id="input_upload_img" name="uploaded_img" type="file" accept="image/*"
                    onchange="previewImage(this.files[0]);"/>
            </div>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" class="form-control" rows="10" name="content">{{ $news->content ?? '
                DJ、音楽プロデューサー、DJ Okawariとは?

                DJ Okawariは日本のDJ、音楽プロデューサー、作曲家だ。「音楽と日常の共存」をテーマに掲げ、生活していく中で感じた事を音で表現している。「DJ OKAWARI」という名前は、常に満足することなく、常に新たなものを模索し、常に挑戦し続けるところに由来するそうだ。美しく柔らかな音色のピアノジャズとヒップホップを組み合わせた独創的な手法の音楽は多くの人に愛されている。アルバムの絵は日本のグラフィックデザイナー、マルヤミンによって描かれている。アルバム「Mirror」の収録曲「Luv Letter」は2010年世界フィギュアスケート選手権に高橋大輔のプログラムにて使用されていた。



                DJ OKAWARIの名曲たち


                DJ OKAWARIの楽曲についてアルバムを紹介しつつ触れていく。2008年〜2017年にリリースされた4枚はいずれもロングセラーとなっている。

                2008年に発売された「Diorama」はデビューアルバムとなる。本人曰く、これは名刺的な意味合いがあるそうだ。2009年に発売されたセカンドアルバム「Mirror」。「Flower Dance」や「Encounter」など人気の楽曲が多く収録されているが、「Luv Letter」が2010年世界フィギュアスケート選手権、高橋大輔のプログラムにて使用されたことでより一層注目を集めることとなった。

                2011年には三枚目のアルバム「Kaleidoscope」が発売された。本人はこのアルバムについて曲以外のアートワーク、エンジニアワーク、レーベルスタッフの支え等、全ての想いが1つになったアルバムだと語っている。

                そして約5年半の間を空けて2017年、4枚目のアルバム「Compass」が発売された。iTunes Jazzアルバムチャートでは配信早々1位を獲得すると言う絶大な人気ぶりだ。「Compass」と言うアルバム名は円（縁）を描くコンパス、聴く人々の気持ちが丸くなり、世界中の人達を繋ぐように、という想いを込めてつけられたとのこと。また、これらのアルバムの他にも国内外の数多くの作品に参加している。



                DJ OKAWARIは海外での人気も高い


                2010年世界フィギュアスケート選手権を機に海外での人気がより一層高まったDJ OKAWARI。2015年8月に行われた中国上海での単独公演では先行チケット販売が10分で完売するという人気ぶり。初の海外単独公演でのこの偉業は公式Twitterでも「ＶＩＰ席含む全700枚が発売当日に完売しました！！」と喜びのツイートが投稿されているほどだ。また2018年にはEmily Stylerというバンドと共に中国ツアーが決定している。北京と上海での公演となるそうだ。


                Photo: https://www.facebook.com/pg/djokawari/

                Written by 編集部' }}
            </textarea>
          </div>
        <div class="d-flex justify-content-end">
            <a href="/admin/news" class="btn btn-secondary btn-user px-5 mr-3">
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
        function previewImage(file) {
            const r = new FileReader();
            r.readAsDataURL(file);
            r.onload = function() {
                preview_img.setAttribute('src', this.result)
            }
        }
    </script>
@endsection
