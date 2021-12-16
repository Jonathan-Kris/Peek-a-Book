@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')
    <form action="/search-product">
        <div class="container">
            <div class="form-row mt-3 align-items-center">
                <label for="category-name" class="col-1">Search: </label>
                <select class="form-control custom-select col-2 mr-4" id="category-name" name="category-name" value="{{ old('category-name') }}">
                    @foreach ($category as $ct)
                        <option value="{{ $ct->category_name }}">{{ $ct->category_name }}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control col-5 mr-4" id="search-query" name="search-query" value="{{ old('search-query') }}">
                <button type="submit" class="btn btn-md btn-primary col-1">Search</button>
            </div>
        </div>
    </form>
    @if (count($product)==0)
        <div class="d-flex flex-row justify-content-center">
            <p class="mt-5 text-danger">No Result</p>
        </div>
    @else
        @auth
        <div class="container product-show">
            <div>
                <div class="d-flex justify-content-evenly align-items-center flex-wrap">
                    @foreach ($product as $prod)
                    <div class="card product-card">
                        <img class="card-img-top" src="{{ Storage::url($prod->image_path) }}" alt="{{ $prod->product_title }}">
                        <div class="card-body">
                        <h5 class="card-title">{{ $prod->product_title }}</h5>
                        <p class="card-text">{{ $prod->product_desc }}</p>
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ url('/update-product') }}" class="btn btn-danger mb-2">Update Product</a>
                        @endif
                        <a href="{{ route('productDetail', $prod->product_id) }}" class="btn btn-primary">Product Detail</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center">
                {{ $product->links() }}
            </div>
        </div>
        @else
        <div class="container product-show">
            <div>
                <div class="d-flex justify-content-evenly align-items-center flex-wrap">
                    @foreach ($product as $prod)
                    <div class="card product-card">
                        <img class="card-img-top" src="{{ Storage::url($prod->image_path) }}" alt="{{ $prod->product_title }}">
                        <div class="card-body">
                        <h5 class="card-title">{{ $prod->product_title }}</h5>
                        <p class="card-text">{{ $prod->product_desc }}</p>
                        <a href="{{ route('productDetail', $prod->product_id) }}" class="btn btn-primary">Product Detail</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center">
                {{ $product->links() }}
            </div>
        </div>
        @endauth
    @endif
@endsection
