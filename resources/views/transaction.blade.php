@extends('layouts.main')

@section('content')
    <div class="container">
        <h3 class="my-3">Transaction</h3>
            <?php
                $number = 1;
            ?>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Transaction Time</th>
                        <th scope="col">Detail Transaction</th>
                      </tr>
                </thead>
                @if (count($trans) != null)
                <tbody>
                    @foreach ($trans as $tr)
                        <tr>
                            <td>
                                {{ $number }}
                            </td>
                            <td>
                                {{ $tr->transaction_time }}
                            </td>
                            <td>
                                <form action="/check-detail/{{ $tr->transaction_id }}" method="POST">
                                    @csrf
                                    <button type='submit' class="btn btn-primary">Check Detail</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            $number += 1;
                        ?>
                    @endforeach
                </tbody>
                @else
                <tbody>
                    <tr>
                        <td>
                            No Transaction
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                    </tr>
                </tbody>
                @endif
            </table>
    </div>
@endsection
