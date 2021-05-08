@extends('layouts.admin_dashboard')

@section('css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
        .card .card-body > .content {
            white-space: pre-line;
        }
        .icons span:not(:last-of-type) {
            margin-right: 20px;
        }
        .icons i {
            margin-right: 5px;
        }
    </style>
@endsection

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">News</h1>
    <hr />
    <div class="d-flex justify-content-end">
        <a href="/admin/news/create" class="btn btn-primary btn-icon-split btn-sm mr-3 mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Create</span>
        </a>
    </div>
    @foreach ($newsList as $news)
    <div class="card shadow mb-4 border-left-primary">
        <a href="#news-{{ $news->id }}" class="d-block card-header py-3" data-toggle="collapse" role="button">
            <div class="d-flex justify-content-between align-items-end">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ $news->date }} | {{ $news->title }}</h6>
                <div class="icons">
                    <span>
                        <i class="fas fa-eye"></i>{{ $news->views }}
                    </span>
                </div>
            </div>
        </a>
        <div class="collapse" id="news-{{ $news->id }}">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        Updated At: {{ $news->updated_at ?? 'Unknown' }}
                    </div>
                    <div>
                        <a href="/admin/news/{{ $news->id }}/edit" class="btn btn-warning btn-icon-split btn-sm mr-3">
                            <span class="icon text-white-50">
                                <i class="fas fa-flag"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>
                        <button class="btn btn-danger btn-icon-split btn-sm"
                                onclick="
                                    document.querySelector('#delete-form{{ $news->id }}').submit();
                                ">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Delete</span>
                        </button>
                        <form id="delete-form{{ $news->id }}" method="POST" action="/admin/news/{{ $news->id }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
                <hr />
                <div class="content">
                    <img class="w-50 d-block mx-auto mb-5" src="{{ $news->img }}" />
                    {{ $news->content }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('js')
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
            console.log(22);
        });

    </script>
@endsection
