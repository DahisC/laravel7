@extends("layouts.template")

@section('css')
    <link rel="stylesheet" href="{{ asset('css/news/news.css') }}">
@endsection

@section('main')
    <div class="container news">
        <div class="title">
            <img
                class="title__image"
                src="https://www.taiwan.net.tw/att/topTitleImg/21_0001001.svg"
            />
            <h2 class="title__text">最新消息</h2>
        </div>
        <div class="page-info">
            <span
                >資料總筆數：
                <span>175</span>
            </span>
            <span
                >每頁筆數：
                <span>10</span>
            </span>
            <span
                >總頁數：
                <span>18</span>
            </span>
            <span
                >目前頁次：
                <span>1</span>
            </span>
            <span>
                <a href="/news/admin">新增文章</a>
            </span>
            <hr />
        </div>
        @foreach ($newsList as $news)
            <article class="news">
                <div>
                    <img
                        class="news__thumbnail"
                        src="{{ $news->img }}"
                    />
                </div>
                <div>
                    <div class="news__tag">
                        最新消息
                    </div>
                    <div class="news__title">
                        <a href="/news/{{ $news->id }}"
                            >{{ $news->title }}</a
                        >
                    </div>
                    <div class="news__date">
                        {{ $news->date }}
                    </div>
                    <div class="news__content">
                        {{ $news->content }}
                    </div>
                </div>
            </article>
        @endforeach
    </div>
@endsection
