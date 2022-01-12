@extends('layouts.main')

@section('content')
    <div class="container">
        <h3 class="my-2">Shopping Cart</h3>
        <?php
        $number = 1;
        $grandTotal = 0;
        ?>
        <table class="table mt-2">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="userid">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sub-Total</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @if ($cart == null)
                    <tr>
                        <td colspan="3">
                            <h2>There are no item in the cart</h2>
                        </td>
                    </tr>
                @else
                    @foreach ($cart->detailTransaction as $crt)
                        <tr>
                            <td>
                                {{ $number }}
                            </td>
                            <td>
                                {{ $crt->product->product_title }}
                            </td>
                            <td>
                                {{ $crt->product->product_price }}
                            </td>
                            <td>
                                {{ $crt->quantity }}
                            </td>
                            <td>
                                {{ $crt->quantity * $crt->product->product_price }}
                            </td>
                            <td>
                                <form action="/delete-item-cart/{{ $crt->product_id }}/{{ $crt->transaction_id }}"
                                    method="POST">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type='submit' class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        $number += 1;
                        $grandTotal += $crt->quantity * $crt->product->product_price;
                        ?>
                    @endforeach
                @endif
            </tbody>
        </table>
        @if ($cart != null)
            <div class="d-flex flex-row-reverse">
                <p>Grand Total: Rp.{{ $grandTotal }},-</p>
            </div>
            <div class="d-flex flex-row-reverse">
                <form action="/checkout/{{ $crt->transaction_id }}" method="POST">
                    @csrf
                    <button type='submit' class="btn btn-primary">Checkout</button>
                </form>
            </div>
        @endif
    </div>
@endsection
