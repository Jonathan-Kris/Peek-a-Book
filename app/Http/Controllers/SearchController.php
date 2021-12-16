<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class SearchController extends Controller
{
    //
    public function index(){
        $products = Product::paginate(6);
        $categories = Category::all();
        return view('searchPage',["product"=>$products,"category"=>$categories]);
    }

    public function searching(){
        $name = request('search-query');
        $category_name = request('category-name');
        $categories = Category::all();
        $products = Product::Where('product_title','like','%'.$name.'%')->join('categories','products.category_id','=','categories.category_id')->Where('categories.category_name',$category_name)->paginate(6);
        $products->appends(['search-query'=>$name, 'category-name'=>$category_name]);
        return view('searchPage',['product'=>$products,"category"=>$categories]);
    }
}
