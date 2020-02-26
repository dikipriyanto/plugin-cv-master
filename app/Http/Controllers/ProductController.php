<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        
        return view ('product.product_index', compact('products'));
    }
  
    public function store(Request $request){
        $this->validate($request, [
             'nama' => 'required',
             'deskripsi' => 'required',
             'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
 
        $file = $request->file('logo')->store('gambar_product');
  
         product::create([
             'nama' => $request->nama,
             'deskripsi' => $request->deskripsi,
             'gambar' => $file,
         ]);
  
         return redirect()->back();
    }


    public function destroy(Product $products, $id){
        $gambar = $products->gambar;

        if(Storage::exists($gambar)){
            Storage::delete($gambar);
        }

        $products = Product::findOrFail($id);

        $products->delete();

        return redirect()->back();
    }

    public function edit($id){
        //mencari id dari data
        $product = product::findOrFail($id);

        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id){
        //mencari data berdasarkan id
        $product = product::find($id);

        //validasi
        $this->validate($request,[
            'nama' =>'required',
            'deskripsi' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        //mengambil nama logo dari database
        $gambar = $product->gambar;

        //Kondisi jika foto tidak kosong
        if($request->gambar){
            //mengambil value dari input logo
            $gambar = $request->file('gambar')->store('logo_product');
            //Nama dari path logo
            $gambar_path = $product->logo;
            //jika foto ada
            if(Storage::exists($gambar_path)){
                //menghapus foto
                Storage::delete($gambar_path);
            }
        }
        $product->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambar
        ]);

        return redirect()->route('product.index');
    }
 
}
