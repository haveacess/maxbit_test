<?php

namespace App\Services;

use App\Models\ProductsModel;

class ProductsService 
{
    CONST FORMAT_TITLE = '/^[a-zA-Z,.?!\s\d]{2,200}$/m';
	CONST FORMAT_DIGITS_DEC_2 = '/^[\d]{0,}(\.[\d]{0,2})?$/m'; //decimal part is optional

    public function __construct()
    {
        
    }
    
    public function getAllProducts()
    {
        return ProductsModel::all();
    }

    public function addProduct($data)
    {
        try{
            $newProduct = new ProductsModel($data);
            $newProduct->save();

            return true;
         }
         catch(\Exception $e){
            return false;
         }
    }

    public function getProduct($id) 
    {
        $product = new ProductsModel();
        return $product::find($id);
    }

    public function updateProduct($id, $data)
    {
        try{
            $product = ProductsModel::find($id);

            if (!$product) {
                return false;
            }

            $product->title = $data['title'];
            $product->parent_id = $data['parent_id'];
            $product->price = $data['price'];
            
            $product->save();

            return true;
         }
         catch(\Exception $e){
            return false;
         }
    }

    public function removeProduct($id) {
        try{
            $product = ProductsModel::find($id);

            if (!$product) {
                return false;
            }
            
            $product->delete();

            return true;
         }
         catch(\Exception $e){
            return false;
         }
    }

    public static function getValidRules()
    {
        return [
            'title' => ['required', "regex:" . self::FORMAT_TITLE],
            'parent_id' => ['integer', 'nullable'],
            'price' => ['required', "regex:" . self::FORMAT_DIGITS_DEC_2]
        ];
    }
}