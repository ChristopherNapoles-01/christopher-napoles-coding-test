<?php
    namespace App\Interfaces;

    Interface ProductRepositoryInterface{
        public function findById($productId);
        public function fetchProducts();
        public function saveNewProduct($data);
        public function saveProductUpdates($id,$data);
        public function deleteExistingProduct($id);
    }