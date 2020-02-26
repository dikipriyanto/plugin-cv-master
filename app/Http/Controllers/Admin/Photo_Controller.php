<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Photo_Controller extends Controller
{
    public function index(){
        $title = 'Upload Photo';
 
        return view('admin.photo.photo_index',compact('title'));
    }
 
    public function store(Request $request){
        try {
            $file = $request->file('image');
            $destinationPath = 'uploads';
            $file->move($destinationPath,$file->getClientOriginalName());
 
            $pf = \DB::table('profile')->first();
 
            \DB::table('profile')->where('id',$pf->id)->update([
                'photo'=>$file->getClientOriginalName()
            ]);
 
            \Session::flash('sukses','Berhasil Upload');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
 
        return redirect('admin/photo');
    }
}
