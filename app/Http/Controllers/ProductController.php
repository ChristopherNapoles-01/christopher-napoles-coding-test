<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;




class ProductController extends Controller
{   
    /**
    * method getProducts
    * @param request
    * return paginated products if success and error message when there is an error
    * CPN - 04/15/2023
    */
    public function getProducts(Request $request){
        try{
            $products = DB::table('product')->paginate(5);
            $response = response(['products' => $products],200);
            return $response;
        }catch(\Exception $e){
            return response(['errorMessage' => $e->getMessage()]);
        }
    }

    /**
    * method getProductsDetails
    * @param request
    * return product details if success and error message when there is an error
    * CPN - 04/15/2023
    */
    public function getProductDetails(Request $request){
        try{
            $id = $request->productId ?? '';
            $productDetails = Product::findOrFail($id) ?? '';

            $response = response(['productDetails' => $productDetails],200);
            return $response;
        }catch(\Exception $e){
            return response(['errorMessage' => $e->getMessage()]);
        }

    }

    /**
    * method createProduct
    * @param request
    * return success message if creating of product is success and error message when there is an error
    * CPN - 04/15/2023
    */
    public function createProduct(Request $request){
        try{
            $validator = Validator::make($request->data,[
                'name' => 'required',
                'description' => 'required',
                'price' => 'required | numeric'

            ]);
            if($validator->fails()){
                return response(['isSuccess' => false, 'errorMessage' => $validator->messages()]);
            }
            $createdProduct = Product::create($request->data);
            $response = response(['isSuccess' => true,'createdProduct' => $createdProduct],200);
            return $response;
        }catch(\Exception $e){
            return response(['isSuccess' => false,'errorMessage' => $e->getMessage()]);
        }
    }
    
}
