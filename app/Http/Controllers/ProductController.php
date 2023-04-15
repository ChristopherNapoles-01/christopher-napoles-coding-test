<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



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
            return response(['products' => $products]);
        }catch(\Exception $e){
            return response(['errorMessage' => $e->getMessage()]);
        }
    }
}
