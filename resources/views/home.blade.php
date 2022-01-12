@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    {{-- If User were seller --}}
    @auth
        <div class="container">
            <div class="d-flex justify-content-evenly align-items-center flex-wrap content w-100">
                @foreach ($products as $p)
                <div class="card product-card">
                    <img class="card-img-top" src="{{ Storage::url($p->image_path) }}" alt="{{ $p->product_title }}">
                    <div class="card-body">
                    <h5 class="card-title">{{ $p->product_title }}</h5>
                    <p class="card-text">{{ $p->product_desc }}</p>
                    @if (Auth::user()->role == 'admin')
                        <a href="/update-product/{{ $p->product_id }}" class="btn btn-danger mb-2">Update Product</a>
                    @endif
                    <a href="{{ route('productDetail', $p->product_id) }}" class="btn btn-primary">Product Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    {{-- Normal User --}}
    @else
        <div class="container">
            <div class="d-flex justify-content-evenly align-items-center flex-wrap content">
                @foreach ($products as $p)
                <div class="card product-card">
                    <img class="card-img-top" src="{{ Storage::url($p->image_path) }}" alt="{{ $p->product_title }}">
                    <div class="card-body">
                    <h5 class="card-title">{{ $p->product_title }}</h5>
                    <p class="card-text">{{ $p->product_desc }}</p>
                    <a href="{{ route('productDetail', $p->product_id) }}" class="btn btn-primary">Product Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endauth
@endsection
