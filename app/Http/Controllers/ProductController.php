<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\ProductService;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;





class ProductController extends Controller
{   
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
    * method getProducts
    * @param request
    * return paginated products if success and error message when there is an error
    * CPN - 04/15/2023
    */
    public function getProducts(Request $request){
        try{
            $productsToPaginate = $this->productService->getProductsService();
            $collection = new Collection($productsToPaginate);
            $page = request('page', $request->page ?? 1);
      
            $paginator = new LengthAwarePaginator(
                $collection->forPage($page, 5),
                $collection->count(),
                5,
                $page,
                ['path' => request()->url(), 'query' => request()->query()]
            );
            $products = $paginator->items();
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
            $productDetails = $this->productService->getProductDetailsService($id);

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
                'name' => 'required | max:255',
                'description' => 'required',
                'price' => 'required | numeric'

            ]);
            if($validator->fails()){
                return response(['isSuccess' => false, 'errorMessage' => $validator->messages()]);
            }
            $createdProduct = $this->productService->saveProductService($request->data);
            $response = response(['isSuccess' => true,'createdProduct' => $createdProduct],200);
            return $response;
        }catch(\Exception $e){
            return response(['isSuccess' => false,'errorMessage' => $e->getMessage()]);
        }
    }


    /**
    * method updateProduct
    * @param request
    * return success message if updating of product is success and error message when there is an error
    * CPN - 04/15/2023
    */
    public function updateProduct(Request $request){
        try{
            $id = $request->productId ?? '';
            $validator = Validator::make($request->data,[
                'name' => 'required|max:255',
                'description' => 'required',
                'price' => 'required | numeric'

            ]);
            if($validator->fails()){
                return response(['isSuccess' => false, 'errorMessage' => $validator->messages()]);
            }
        
            $updatedProduct = $this->productService->updateProductService($id,$request->data);
            $response = response(['isSuccess' => $updatedProduct],200);
            return $response;
        }catch(\Exception $e){
            return response(['isSuccess' => false,'errorMessage' => $e->getMessage()]);
        }
    }

     /**
    * method deleteProduct
    * @param request
    * return success message if deleting of product is success and error message when there is an error
    * CPN - 04/15/2023
    */
    public function deleteProduct(Request $request){
        try{
            $id = $request->productId ?? '';
            $deletedProduct = $this->productService->deleteProductService($id);
            $response = response(['isSuccess'=>$deletedProduct]);
            return $response;
        }catch(\Exception $e){
            return response(['isSuccess' => false,'errorMessage' => $e->getMessage()]);
        }
    }
    
}
