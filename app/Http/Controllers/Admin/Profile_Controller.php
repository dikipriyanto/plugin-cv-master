<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Profile_Controller extends Controller
{
    public function index(){
        $title = 'Manage Profile';
        $profile = \DB::table('profile')->first();
 
        return view('profile.profile_index',compact('title','profile'));
    }
 
    public function update(Request $request,$id){
        $nama = $request->nama;
        $email = $request->email;
        $phone = $request->phone;
        $alamat = $request->alamat;
 
        try {
            \DB::table('profile')->where('id',$id)->update([
                // 'id'=>'a',
                'nama'=>$nama,
                'email'=>$email,
                'phone'=>$phone,
                'alamat'=>$alamat
            ]);
 
            \Session::flash('sukses','Data berhasil diupdate');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
 
        return redirect('admin/profile');
    }
}
