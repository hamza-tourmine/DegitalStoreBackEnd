<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Http\Resources\ReviewResource;
use App\Models\Categorie;
use App\Models\productImage;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{


    public function index(){
        // $products = DB::table('products')
        //         ->select('products.*','catigories.*','product_image.*')
        //         ->rightJoin('catigories', 'products.catigorieid', '=', 'catigories.id')
        //         ->rightJoin('product_image', 'products.id', '=', 'product_image.Product_id')
        //         ->get();

    //  $products = Product::with('ca', 'images')->get();
    //  $products = DB::table('products')
    // ->select('products.*', 'catigories.name as category_name', 'product_image.image as image_url')
    // ->leftJoin('catigories', 'products.catigorieid', '=', 'catigories.id')
    // ->leftJoin('product_image', 'products.id', '=', 'product_image.product_id')
    // ->get();



        $products = Product::with( 'images','category','review')->get();
        //  return ReviewResource::collection($products);
        foreach ($products as $product) {
            unset($product->category_id);
            foreach ($product->review as $review) {
                // Remove unwanted fields directly:
                unset($review->productsId);
                unset($review->custommerId);
            }
            foreach($product->images as $image){
                unset($image->product_id);
            }
        }
        return response()->json($products, 200);
        // return response()->json(['data' => $products, 'status' => 200]);
    }




    // how by id
    public function show(Request $request){
        $products = product::find($request->id);

        //  return ReviewResource::collection($products);
        //
        if($products){
            $product =$products->load(['images','category','review']);





            return response()->json([['data'=>$product , 'status'=>200]]);
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
