<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;


class ProductApiTest extends TestCase
{
    
     /**
     * test product list api.
     *
     * @return void
     */
    public function test_get_products(){

        $response = $this->get('/api/get-products');

        $data = json_decode($response->getContent(), true);
      
        !array_key_exists('errorMessage',$data) ? $response->assertStatus(200) : $response->assertStatus(500);
            
    }


     /**
     * test product details api.
     *
     * @return void
     */
    public function test_get_products_details(){

        $response = $this->get('/api/product-details?productId=1');

        $data = json_decode($response->getContent(), true);
      
        !array_key_exists('errorMessage',$data) ? $response->assertStatus(200) : $response->assertStatus(500);
            
    }


    /**
     * test create product api.
     *
     * @return void
     */
    public function test_create_product(){

        $data = [
            'name' => 'sample',
            'description' => 'Sample Product',
            'price' => 78.90
        ];
        $data = http_build_query(['data' => $data]);
        $response = $this->post("/api/create-product?".$data);
        $responseData = json_decode($response->getContent(), true);
        $responseData['isSuccess'] == true ? $response->assertStatus(200) : $response->assertStatus(500);
            
    }

       /**
     * test update product api.
     *
     * @return void
     */
    public function test_update_product(){

        $tableId = DB::table('product')->select('id')->orderBy('id','DESC')->first();
        $data = [
            'name' => "Product $tableId->id",
            'description' => 'Updated Data',
            'price' => 90.9
        ];
        
        $data = http_build_query(['data' => $data]);
        //update latest data
        $response = $this->put("/api/update-product?productId=$tableId->id&".$data);
        $responseData = json_decode($response->getContent(), true);
        $responseData['isSuccess'] == true ? $response->assertStatus(200) : $response->assertStatus(500);
            
    }


    /**
     * test update product api.
     *
     * @return void
     */
    public function test_delete_product(){

        $data = [
            'name' => "ProdToDelete",
            'description' => 'Deleted Data',
            'price' => 90.9
        ];
              
        $data = http_build_query(['data' => $data]);

        //create a data to be deleted
        $this->post("/api/create-product".$data);
        $tableId = DB::table('product')->select('id')->orderBy('id','DESC')->first();

        //delete the recently created data
        $response = $this->delete("/api/delete-product?productId=$tableId->id");
        $responseData = json_decode($response->getContent(), true);
        $responseData['isSuccess'] == true ? $response->assertStatus(200) : $response->assertStatus(500);
            
    }

    
}
