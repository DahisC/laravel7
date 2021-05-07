@extends("layouts.template")

@section('css')
    <link rel="stylesheet" href="{{ asset('css/news/news.css') }}">
@endsection

@section('main')
    <div class="container news-content">
        <div class="title">
            <h2 class="title__text">{{ $news->title }}</h2>
        </div>
        <div class="page-info">
            <span
                >發布日期：
                <span>{{ $news->date }}</span>
            </span>
            <span
                >瀏覽次數：
                <span>{{ $news->views }}</span>
            </span>
            <span>
                <a href="/news/{{ $news->id }}/edit">編輯</a>
            </span>
            <span>
                <a href="/news/delete/{{ $news->id }}">刪除</a>
                {{-- <form id="delete_form" action="/news/{{ $news->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">刪除</button>
                </form> --}}
            </span>
            <hr />
        </div>
        <div class="news">
            <div>
                <div class="news__content">
                    {{ $news->content }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{-- <script>
        const { textContent } = document.querySelector('.news__content');
        textContent = //.exec(textContent);
    </script> --}}
@endsection
