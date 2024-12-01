<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ShopCntroller extends Controller
{
    public function showShops(){
        if(Auth::user()){
        $shops = Shop::get()->all();
        return response()->json([
            'message' =>'All shops',
            'data' =>$shops,
        ]);}
        else{
            return response()->json([
                'message'=>'you have to login/signup again'
            ]);
        }
    }
    public function showShopDetails(Request $request){
        if(Auth::user()){
            $shop = Shop::find($request->id);
            return response()->json([
                'data'=>$shop,
            ]);
        }
        else{
            return response()->json([
                'message'=>'you have to login/signup again'
            ]);
        }
    }
}