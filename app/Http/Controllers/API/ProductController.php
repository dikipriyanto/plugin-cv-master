<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        $results = [];

        foreach($products as $product){
            $results [] = [
                'id' => $product->id,
                'nama' => $product->nama,
                'deskripsi' => $product->deskripsi,
                'gambar' => $product->gambar,
            ];
        }

        return response()->json([
            'message' => 'success',
            'status' => true,
            'results' => $results
        ]);
    }
}
