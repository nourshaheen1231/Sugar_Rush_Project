<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProducts(Request $request) {
        
        if(Auth::user()) {

            //$products = Product::query()->where('shop_id',$request->id)->get();
            $products = Shop::find($request->id)->product;
            return response()->json([
                'message' => 'All Products',
                'Products' => $products
            ]);
        }
        else{
            return response()->json([
                'message'=>'you have to login/signup again'
            ]);
        }
    }

    public function isFav($user,$id){
        $fav =Favorite::where('product_id',$id)->where('user_id',$user->id)->get();
        if($fav->isEmpty()){
           return false;
        }
        else {
            return true;
        }

    }
    public function showProductDetails(Request $request){
        $user = Auth::user();
        if($user){
        $product = Product::find($request->id);
        $isFav =$this->isFav($user,$request->id);
        return response()->json([
            'data'=>$product,
            'isfavorite'=>$isFav
        ]);
        }
        else{
            return response()->json([
                'message'=>'you have to login/signup again'
            ]);
        }
    }

    public function searchProduct(Request $request)
    {
        if(Auth::user()){
        $products = Product::search(($request->name))->get();
        $results = $products->where('shop_id',$request->id);
        if($results->isEmpty()) {
            return response()->json([
                'message' => 'not found'
            ]);
        }
        return response()->json([
            'message'=>'Product found successfully',
            'data'=>$results,
        ]);
    }
    else{
        return response()->json([
            'message'=>'you have to login/signup again'
        ]);
    } 
    }
}
