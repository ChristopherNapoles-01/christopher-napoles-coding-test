<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    //service method for getting the product details
    public function getProductDetailsService($productId){
        return $this->productRepository->findById($productId);
    }

    //service method for getting the product list
    public function getProductsService(){
        return $this->productRepository->fetchProducts();
    }

    //service method for creating new product
    public function saveProductService($data){
        return $this->productRepository->saveNewProduct($data);
    }

    public function updateProductService($id,$data){
        return $this->productRepository->saveProductUpdates($id,$data);
    }

    //service method for deleting product
    public function deleteProductService($id){
        return $this->productRepository->deleteExistingProduct($id);
    }
}