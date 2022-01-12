@extends('layouts.main')

@section('content')
    <div class="container">
        <h3 class="my-3">Cart</h3>
            <?php
                $number = 1;
                $grandTotal = 0;
            ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Detail</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Sub Total</th>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($trans->detailTransaction as $tr)
                        <tr>
                            <td>
                                {{ $number }}
                            </td>
                            <td>
                                {{ $tr->product->product_title }}
                            </td>
                            <td>
                                {{ $tr->product->product_desc }}
                            </td>
                            <td>
                                {{ $tr->product->product_price }}
                            </td>
                            <td>
                                {{ $tr->quantity }}
                            </td>
                            <td>
                                {{ $tr->quantity * $tr->product->product_price}}
                            </td>
                        </tr>
                        <?php
                            $number += 1;
                            $grandTotal += $tr->quantity * $tr->product->product_price;
                        ?>
                    @endforeach
                </tbody>
            </table>
        <div class="d-flex flex-row-reverse">
            <p>Grand Total: Rp.{{ $grandTotal }},-</p>
        </div>
    </div>
@endsection
