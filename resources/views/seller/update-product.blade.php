@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/updateProduct.css') }}">
@endpush

@section('content')
<div class="container col-6 mt-5">
    <div class="card">
        <h5 class="card-header">Update Product</h5>
        <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="/api/update-product/{{ $product_id }}">
                @csrf
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-select @error('category') is-invalid @enderror"
                    name="category" id="category">
                        <option>Select Category</option>
                        {{-- Dynamically Show Category from DB --}}
                        @foreach ($categories as $c)
                            <option
                                value="{{ $c->category_id }}"
                                {{-- Select Category of Updated Book --}}
                                @if ($book->category_id == $c->category_id) selected @endif
                            >{{ $c->category_name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                     name="title" id="title" value="{{ $book->product_title }}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                    name="description" id="description" cols="20" rows="5">{{ $book->product_desc }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                     name="price" id="price" value={{ $book->product_price }}>
                    @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" class="form-control @error('stock') is-invalid @enderror"
                    name="stock" id="stock" value={{ $book->product_stock }}>
                    @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" class="form-label">Product Image</label>
                    <input class="form-control @error('image') is-invalid @enderror"
                     name="image" type="file" id="image">
                    @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                    <button type="submit" class="btn btn-primary col-5 ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
