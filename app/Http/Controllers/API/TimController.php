<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tim;

class TimController extends Controller
{
    public function index(){
        $tims = Tim::all();

        $results = [];

        foreach($tims as $tim){
            $results [] = [
                'id' => $tim->id,
                'nama' => $tim->nama,
                'jabatan' => $tim->jabatan,
                'foto' => $tim->foto,
            ];
        }

        return response()->json([
            'message' => 'success',
            'status' => true,
            'results' => $results
        ]);
    }
}
