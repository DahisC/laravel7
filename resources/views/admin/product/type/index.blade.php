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
    <h1 class="h3 mb-4 text-gray-800 text-center">Type</h1>
    <hr />
    <div class="d-flex justify-content-end">
        <a href="{{ route('admin.product.type.create') }}" class="btn btn-primary btn-icon-split btn-md mb-3">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Create</span>
        </a>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($productTypeList as $productType)
            <div class="col-12 col-sm-6 col-lg-4 mb-3">
                <div class="card border-left-primary shadow h-100 py-2" onclick="location.replace('{{ route('admin.product.type.edit', ['type' => $productType->id]) }}')">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <span class="text-gray-300">標籤：</span>{{ $productType->type }}
                                </div>
                            </div>
                            <div class="col-auto">
                                {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                                <span class="text-gray-300">ID: {{ $productType->id }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
