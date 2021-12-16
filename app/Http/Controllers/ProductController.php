<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use App\models\DetailTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexInsert()
    {
        $categories = Category::all();
        return view("seller.insert-product", ["categories" => $categories]);
    }

    public function indexUpdate($product_id)
    {
        $categories = Category::all();
        $book = Product::where('product_id', $product_id)->first();
        return view("seller.update-product", [
            "categories" => $categories,
            "product_id" => $product_id,
            "book" => $book]);
    }

    /**
     * Store a newly created resource in storage (INSERT PRODUCT)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedInput =  $this->validate($request, [
            'category' => ['required'],
            'title' => ['required', 'min:5', 'max:25'],
            'description' => ['required', 'min:10', 'max:100'],
            'price' => ['required', 'numeric', 'min:1000', 'max:10000000'],
            'stock' => ['required', 'numeric', 'min:1'],
            'image' => ['required']
        ]);

        # Storing Image
        $file = $request->file('image');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs('public/images', $file, $imageName);
        $imagePath = 'images/'.$imageName;

        $product = new Product;
        $product->category_id = $validatedInput['category'];
        $product->product_title = $validatedInput['title'];
        $product->product_desc = $validatedInput['description'];
        $product->product_price = $validatedInput['price'];
        $product->product_stock = $validatedInput['stock'];
        $product->image_path = $imagePath;

        $product->save();

        return redirect("/home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $detail = Product::Where('product_id',$id)->first();

        return view('productDetail',["detailProduct"=>$detail]);
    }

    public function add_to_cart(Request $request, $id){
        $stock = Product::Where('product_id',$id)->first();
        $stock = $stock['product_stock'];
        $validateData = $request->validate([
            'quantity' => ['numeric', 'min:1', 'max:'.$stock],
        ]);
        $alreadyInCart = TransactionHeader::Where('user_id',Auth::user()->id)->Where('status','cart')->first();
        if($alreadyInCart == null){
            $newTransaction = new TransactionHeader;
            $newTransaction->user_id = Auth::user()->id;
            $newTransaction->status = 'cart';

            $newTransaction->save();
            // dd($newTransaction);
            $newDetailTrans = new DetailTransaction;
            $newDetailTrans->transaction_id = $newTransaction['id'];
            $newDetailTrans->product_id = $id;
            $newDetailTrans->quantity = $validateData['quantity'];

            $newDetailTrans->save();
        }else if($alreadyInCart != null){
            $alreadyInDetail = DetailTransaction::Where('transaction_id',$alreadyInCart['transaction_id'])->Where('product_id',$id)->first();

            if($alreadyInDetail == null){
                $newDetailTrans = new DetailTransaction;
                $newDetailTrans->transaction_id = $alreadyInCart['transaction_id'];
                $newDetailTrans->product_id = $id;
                $newDetailTrans->quantity = $validateData['quantity'];

                $newDetailTrans->save();
            }else if($alreadyInDetail != null){
                DetailTransaction::Where('transaction_id',$alreadyInCart['transaction_id'])->Where('product_id',$id)->update(['quantity'=>$alreadyInDetail['quantity']+$validateData['quantity']]);
            }
        }
        Product::Where('product_id',$id)->update(['product_stock'=>$stock-$validateData['quantity']]);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedInput =  $this->validate($request, [
            'category' => ['required'],
            'title' => ['required', 'min:5', 'max:25'],
            'description' => ['required', 'min:10', 'max:100'],
            'price' => ['required', 'numeric', 'min:1000', 'max:10000000'],
            'stock' => ['required', 'numeric', 'min:1']
        ]);

        $product = Product::find($id);
        $product->category_id = $validatedInput['category'];
        $product->product_title = $validatedInput['title'];
        $product->product_desc = $validatedInput['description'];
        $product->product_price = $validatedInput['price'];
        $product->product_stock = $validatedInput['stock'];

        # Storing Image
        if($request->image != null){
            $file = $request->file('image');
            $imageName = time().'.'.$file->getClientOriginalExtension();
            Storage::putFileAs('public/images', $file, $imageName);
            $imagePath = 'images/'.$imageName;

            $product->image_path = $imagePath;
        }

        $product->save();

        $request->session()->flash('Insert', 'Insert Successful!');
        return redirect("/home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
