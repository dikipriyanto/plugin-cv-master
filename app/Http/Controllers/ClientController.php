<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Storage;


class ClientController extends Controller
{
    public function index(){
        $Clients = Client::all();
        
        return view ('Clients.Clients_index', compact('Clients'));
    }
  
    public function store(Request $request){
        $this->validate($request, [
             'nama_perusahaan' => 'required',
             'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
 
        $file = $request->file('logo')->store('logo_perusahaan');

         Client::create([
             'nama_perusahaan' => $request->nama_perusahaan,
             'logo' => $file,
         ]);
  
         return redirect()->back();
    }
 
    public function destroy(Client $Clients, $id){
        $logo = $Clients->logo;
        if(Storage::exists($logo)){
            Storage::delete($logo);
        }

        //mencari id
        $Clients = Client::findOrFail($id);
        //menghapus data
        $Clients->delete();
        //kembali ke index
        return redirect()->back();
    }

    public function edit($id){
        //mencari id dari data
        $Clients = Client::findOrFail($id);

        return view('Clients.edit', compact('Clients'));
    }

    public function update(Request $request, $id){

        // dd($request->nama);
        //mencari data berdasarkan id
        $Clients = Client::find($id);

        //validasi
        $this->validate($request,[
            'nama' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        //mengambil nama logo dari database
        $gambar = $Clients->logo;

        //kondisi jika foto tidak kosong
        if($request->logo){
            //mengambil value dari input logo
            $gambar = $request->file('logo')->store('logo_perusahaan');
            //nama dari path logo
            $foto_path = $Clients->logo;
            // dd($foto_path);
            //jika foto ada
            if(Storage::exists($foto_path)){
                //menghapus foto
                Storage::delete($foto_path);
            }
        }
        $Clients->update([
            'nama_perusahaan' => $request->nama,
            'logo' => $gambar
        ]);

        return redirect()->route('Clients.index');
    }
}
