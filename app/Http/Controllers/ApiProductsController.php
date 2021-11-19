<?php

namespace App\Http\Controllers;

use App\Models\Models\ProductsModel;
use Illuminate\Http\Request;
use App\Services\ProductsService;
use Database\Seeders\ProductsSeeder;
use Illuminate\Support\Facades\Validator;

class ApiProductsController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = new ProductsService();
        return response()->json($service->getAllProducts());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $service = new ProductsService();
        $validator = Validator::make($request->all(), ProductsService::getValidRules());

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'error' => $validator->errors()->first()
            ], 422);
        }

        $isCreatedProduct = $service->addProduct([
            'title' => $request->get('title'),
            'parent_id' => $request->get('parent_id'),
            'price' => $request->get('price')
        ]);

        return response()->json(['ok' => $isCreatedProduct], $isCreatedProduct ? 200 : 409);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = new ProductsService();
        $product = $service->getProduct($id);

        return response()->json($product, !empty($product) ? 200 : 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = new ProductsService();
        $validator = Validator::make($request->all(), ProductsService::getValidRules());

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'error' => $validator->errors()->first()
            ], 422);
        }

        $isUpdated = $service->updateProduct($id, [
            'title' => $request->get('title'),
            'parent_id' => $request->get('parent_id'),
            'price' => $request->get('price')
        ]);

        return response()->json(['ok' => $isUpdated], $isUpdated ? 200 : 409);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = new ProductsService();
        $isDeleted = $service->removeProduct($id);

        return response()->json(['ok' => $isDeleted], $isDeleted ? 200 : 409);
    }

}
