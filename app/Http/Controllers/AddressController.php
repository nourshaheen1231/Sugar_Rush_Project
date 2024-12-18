<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function showParentRegion(){
        $Parents = Address::where('parent_id',null)->get();
        return response()->json($Parents,200);
    }

    public function showChildRegion(Request $request){
        $childs = Address::where('parent_id',$request->id)->get();
        return response()->json($childs,200);
    }
}