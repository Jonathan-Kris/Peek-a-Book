<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\TransactionHeader;

class CartController extends Controller
{
    public function index($id){
        $cart = TransactionHeader::Where('user_id', $id)->Where('status','cart')->first();

        return view('cart',['cart'=>$cart]);
    }
}
