<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index($id){
        $cart = TransactionHeader::Where('user_id', $id)->Where('status','cart')->first();

        return view('cart',['cart'=>$cart]);
    }

    public function deleteFromCart($product_id, $transaction_id){
        $stockDeleted = DetailTransaction::Where('transaction_id',$transaction_id)->Where('product_id',$product_id)->first()['quantity'];
        DetailTransaction::Where('transaction_id',$transaction_id)->Where('product_id',$product_id)->delete();

        $stockOriginal = Product::Where('product_id',$product_id)->first()['product_stock'];
        Product::Where('product_id',$product_id)->update(['product_stock'=>$stockOriginal+$stockDeleted]);

        $isNull = DetailTransaction::Where('transaction_id',$transaction_id)->first();
        if($isNull == null){
            TransactionHeader::Where('transaction_id', $transaction_id)->Where('user_id',Auth::user()->id)->Where('status','cart')->delete();
        }

        return redirect()->back();
    }

    public function checkoutTransaction($transaction_id){
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');

        TransactionHeader::Where('transaction_id',$transaction_id)->Where('user_id',Auth::user()->id)
            ->where('status','cart')->update(['status'=>'purchased','transaction_time'=>$date]);
        $trans = TransactionHeader::Where('user_id',Auth::user()->id)->where('status','purchased')->get();

        return view('transaction',['trans'=>$trans]);
    }
}
