@extends('layouts.main')

@section('content')
    <div class="container">
        <table class="table mt-2">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="userid">Book ID</th>
                    <th scope="col">Book Title</th>
                    <th scope="col" class="username">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @if ($cart == null)
                    <tr>
                        <td colspan="3"><h2>There are no item in the cart</h2></td>
                    </tr>
                @else
                    @foreach ($cart->detailTransaction as $crt)
                    <tr>
                        <td class="userid">{{ $crt->product->product_id }}</td>
                        <td>{{ $crt->product->product_title }}</td>
                        <td class="username">{{ $crt->quantity }}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
