@extends('layouts.main')

@push('styles')
@endpush

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-7">
                <h1>{{ $detailProduct->product_title }}</h1>
                <h5>Description : </h5>
                <p class="desc">{{ $detailProduct->product_desc }}</p>
                <h5>Stock : </h5>
                <p>{{ $detailProduct->product_stock }} piece(s)</p>
                <h5>Price : </h5>
                <p>Rp. {{ $detailProduct->product_price }} ,-</p>
                @auth
                    @if (Auth::user()->role == 'customer')
                        <h3>Add To Cart</h3>
                        <form action="/add-to-cart/{{ $detailProduct->product_id }}">
                            <div class="form-row justify-content-center">
                                <label for="quantity" class="col-2">Quantity : </label>
                                <input type="number" id="quantity" name="quantity" class="form-control col-10 @error('quantity') is-invalid @enderror">
                                @error('quantity')
                                <div class="invalid-feedback error-message">
                                    {{ $message }}
                                </div>
                                @enderror
                                <button type="submit" class="btn btn-md btn-primary mt-3">Submit</button>
                            </div>
                        </form>
                    @endif
                @endauth
            </div>
            <img class="col-5" src="{{ Storage::url($detailProduct->image_path) }}" alt="{{ $detailProduct->product_title }}">
        </div>
    </div>
@endsection
