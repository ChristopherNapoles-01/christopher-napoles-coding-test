<?php
    namespace App\Repositories;

    use App\Models\Product;
    use App\Interfaces\ProductRepositoryInterface;
    
    class ProductRepository implements ProductRepositoryInterface{

        protected $model;

        public function __construct(Product $model){
            $this->model = $model;
        }
        
        //find a certain product
        public function findById($productId){
            $productDetails = $this->model::findOrFail($productId) ?? '';

            return $productDetails;
        }

        //fetch All Products
        public function fetchProducts(){
            $products = $this->model::get() ?? [];
            
            return $products;
        }
        
        //create a new product
        public function saveNewProduct($data){
            $isCreated = $this->model::create($data);

            return $isCreated;
        }
       
        //update an existing product
        public function saveProductUpdates($id,$data){
            $isUpdated = $this->model::findOrFail($id)->update($data);

            return $isUpdated;
        }

        //delete an existing product
        public function deleteExistingProduct($id){
            $isDeleted = $this->model::findOrFail($id)->delete();

            return $isDeleted;
        }
    }

