<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addToFvourite(Request $request) {

        $user = Auth::user();

        if(!$user) {
            return response()->json(['message' => 'you have to login/signup again']);
        }

        $isExsist = Favorite::where('product_id',$request->product_id)->where('user_id',$user->id)->exists();
            
            if($isExsist) {
                return response()->json('already exists');
            }

            $favorite = Favorite::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
            ]);

            return response()->json($favorite,200);
    }

    public function removeFavourite(Request $request) {

        $user = Auth::user();
        if(!$user) {
            return response()->json(['message' => 'you have to login/signup again']);
        }
        $fav = Favorite::where('product_id',$request->product_id)->where('user_id',$user->id);
        $fav->delete();

         return response()->json('product removed successfully',200);
    }

    public function showFav() {

        $user = Auth::user();
        if(!$user) {
            return response()->json(['message' => 'you have to login/signup again']);
        }
        $favs = Favorite::where('user_id', $user->id)->pluck('product_id')->all();
        $products  = Product::whereIn('id',$favs)->get();

        $response = [];
        foreach($products as $product) {
            $response [] = [
                'id' => $product->id ,
                'name' => $product->name ,
                'description' => $product->description ,
                'image' =>  $product->image,
                'price' =>  $product->price,
                'totalQuantity' =>  $product->totalQuantity,
                'shop_id' =>  $product->shop_id,
            ];
        }

        return response()->json($response,200);     
    }
}
