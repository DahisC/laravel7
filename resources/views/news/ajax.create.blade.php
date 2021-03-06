@extends("layouts.template")

@section('css')
    <link rel="stylesheet" href="{{ asset('css/news/news.css') }}">
@endsection

@section('main')
    <div class="container news-admin">
        <form action="{{ isset($news) ? "/news/$news->id" : '/news' }}" method="POST">
            @csrf
            {{-- {{ method_field(isset($news) ? "PUT" : "POST") }} --}}
            {{ method_field($method) }}
            <div>
                <input type="text" hidden name="id" value="{{ $news->id ?? '-1' }}" />
            </div>
            <div>
                <label for="title">標題</label>
                <input id="title" type="text" placeholder="標題 title" name="title" {{ $method == 'DELETE' ? 'disabled' : '' }} value="{{ $news->title ?? '世界が癒される国産ビートメイカーDJ OKAWARIとは？' }}"/>
            </div>
            <div>
                <label for="date">日期</label>
                <input id="date" type="date" placeholder="日期 date" name="date" {{ $method == 'DELETE' ? 'disabled' : '' }} value="{{ $news->date ?? '2020-05-05' }}" />
            </div>
            <div>
                <label for="img">圖片</label>
                <input id="img" type="text" placeholder="圖片 img" name="img" {{ $method == 'DELETE' ? 'disabled' : '' }} value="{{ $news->img ?? 'https://i.ytimg.com/vi/UjLnvXpkq68/maxresdefault.jpg' }}" />
            </div>
            <div>
                <label for="content">內文</label>
                <textarea id="content" type="text" placeholder="內容 Content" name="content" {{ $method == 'DELETE' ? 'disabled' : '' }} rows="10">{{ $news->content ?? 'DJ、音楽プロデューサー、DJ Okawariとは?

                    DJ Okawariは日本のDJ、音楽プロデューサー、作曲家だ。「音楽と日常の共存」をテーマに掲げ、生活していく中で感じた事を音で表現している。「DJ OKAWARI」という名前は、常に満足することなく、常に新たなものを模索し、常に挑戦し続けるところに由来するそうだ。美しく柔らかな音色のピアノジャズとヒップホップを組み合わせた独創的な手法の音楽は多くの人に愛されている。アルバムの絵は日本のグラフィックデザイナー、マルヤミンによって描かれている。アルバム「Mirror」の収録曲「Luv Letter」は2010年世界フィギュアスケート選手権に高橋大輔のプログラムにて使用されていた。




                    DJ OKAWARIの名曲たち

                    DJ OKAWARIの楽曲についてアルバムを紹介しつつ触れていく。2008年〜2017年にリリースされた4枚はいずれもロングセラーとなっている。


                     2008年に発売された「Diorama」はデビューアルバムとなる。本人曰く、これは名刺的な意味合いがあるそうだ。2009年に発売されたセカンドアルバム「Mirror」。「Flower Dance」や「Encounter」など人気の楽曲が多く収録されているが、「Luv Letter」が2010年世界フィギュアスケート選手権、高橋大輔のプログラムにて使用されたことでより一層注目を集めることとなった。



                     2011年には三枚目のアルバム「Kaleidoscope」が発売された。本人はこのアルバムについて曲以外のアートワーク、エンジニアワーク、レーベルスタッフの支え等、全ての想いが1つになったアルバムだと語っている。


                    そして約5年半の間を空けて2017年、4枚目のアルバム「Compass」が発売された。iTunes Jazzアルバムチャートでは配信早々1位を獲得すると言う絶大な人気ぶりだ。「Compass」と言うアルバム名は円（縁）を描くコンパス、聴く人々の気持ちが丸くなり、世界中の人達を繋ぐように、という想いを込めてつけられたとのこと。また、これらのアルバムの他にも国内外の数多くの作品に参加している。





                    DJ OKAWARIは海外での人気も高い

                    2010年世界フィギュアスケート選手権を機に海外での人気がより一層高まったDJ OKAWARI。2015年8月に行われた中国上海での単独公演では先行チケット販売が10分で完売するという人気ぶり。初の海外単独公演でのこの偉業は公式Twitterでも「ＶＩＰ席含む全700枚が発売当日に完売しました！！」と喜びのツイートが投稿されているほどだ。また2018年にはEmily Stylerというバンドと共に中国ツアーが決定している。北京と上海での公演となるそうだ。


                    Photo: https://www.facebook.com/pg/djokawari/

                    Written by 編集部


                    ' }}</textarea>
            </div>
            <button type="submit" method>{{ $submit_btn }}</button>
        </form>
    </div>
@endsection

@section('js')
    <script>
        function fetch({ url, method, body }) {
            fetch(url, { method, body });
        }
    </script>
@endsection
