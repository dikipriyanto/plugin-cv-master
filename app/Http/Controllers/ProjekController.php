<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projek;
use App\Tim;

class ProjekController extends Controller
{
    public function index(){
        $projek = Projek::where('id', 'ASC')->get();
        $tims = Tim::all();
        return view('projek.projek_index', compact('projek','tims'));
    }

    
}
