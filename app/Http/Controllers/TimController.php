<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tim;
use Storage;
class TimController extends Controller
{
    public function index(){
        $tims = Tim::all();
        
        return view ('tim.tim_index', compact('tims'));
    }
 
    public function store(Request $request){
        //validasi
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        //ambil foto dari input lalu disimpan dalam public/gambar
        $foto = $request->file('foto')->store('gambar');
        
        Tim::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto'=> $foto
        ]);

        return redirect()->back(); 
    }

    public function destroy(Tim $tims, $id){
        $foto = $tims->foto;
        if(Storage::exists($foto)){
            Storage::delete($foto);
        }

        //mencari id
        $tims = Tim::findOrFail($id);
        //menghapus data
        $tims->delete();
        //kembali ke index
        return redirect()->back();
    }

    public function edit($id){
        //mencari id dari data
        $tims = Tim::findOrFail($id);

        return view('tim.edit', compact('tims'));
    }

    public function update(Request $request, $id){
        
        // dd($request->nama);
        //mencari data berdasarkan id
        $tim = Tim::find($id);
        
        //validasi
        $this->validate($request, [
            'nama' => 'required',
            'jabatan' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        //mengambil nama foto dari database
        $gambar = $tim->foto;
        
        //kondisi jika foto tidak kosong
        if($request->foto){
            //mengambil value dari input foto
            $gambar = $request->file('foto')->store('gambar');
            //nama dari path foto
            $foto_path = $tim->foto;
            // dd($foto_path);
            //jika foto ada
            if(Storage::exists($foto_path)){
                //menghapus foto
                Storage::delete($foto_path);
            }
        }
        $tim->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $gambar
        ]);

        return redirect()->route('tim.index');
    }
    
}
