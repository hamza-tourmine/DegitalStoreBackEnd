<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productController extends Controller
{
    

    public function index(){
        return response()->json(['data'=>[product::all()], 'status'=> 200]);
    }
    // how by id
    public function show(Request $request){
        $data = product::find($request->id);
        if($data){
            return response()->json([['data'=>$data , 'status'=>200]]);
        }else{
            return response()->json(["message" => 'the product you are looking for does not existe', 'status' => 404]);
        }

    }

    // update
    public function update(Request $request ,$id){
        $product = product::find($id);
        if($product){
            $product->update($request->all());
            return response()->json(['message' => 'Product  updated successfully.', 'product' => $product]);
        }
        else{
            return response()->json(['message'=>'there a problem !' ,'status' => 404]);
        }
    }
    // create
    public function  create(Request $request){
        $product = product::create($request->all());

        if($product){
            return  response()->json(['message'=>'you are create a new product','status'=>201]);

        }else{
            return response()->json(['message'=>'there are problem ', 'status'=>409]);
        }


    }

    // delate
    public function delete(Request $request){
        if(  product::destroy($request->id)){
            return request()->json(['message'=>'you are delete product successfullt','status'=>200]);
        }else{
            return request()->json(['message'=>'the product does not delated !','status'=>409]);
        }
    }
}
