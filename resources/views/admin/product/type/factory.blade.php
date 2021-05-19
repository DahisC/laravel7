@extends('layouts.admin_dashboard')

@section('content')
    <h1 class="h3 mb-4 text-gray-800 text-center">{{ $action }}</h1>
    <hr />
    <form class="user" action="{{ $action == "Create" ? route('admin.product.type.store') : route('admin.product.type.update', ['type' => $type->id]) }}" method="POST">
        @csrf
        @method($action == "Create" ? "POST" : 'PUT')
        <div class="form-group">
            <label for="type">Type</label>
            <input id="type" type="text" class="form-control form-control-user" name="type" value="{{ $type->type ?? '可愛' }}" required autofocus placeholder="Type">
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
