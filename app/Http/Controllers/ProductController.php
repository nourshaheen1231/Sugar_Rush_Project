<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProducts(Request $request) {
        
        if(Auth::user()) {

            $products = Product::query()->where('shop_id',$request->id)->get();

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

    public function showProductDetails(Request $request){
        if(Auth::user()){
        $product = Product::find($request->id);
        return response()->json([
            'data'=>$product,
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
        $results = Product::search(($request->name))->get();
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
