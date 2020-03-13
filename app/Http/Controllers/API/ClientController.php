<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::all();

        $results = [];

        foreach($clients as $client){
            $results [] = [
                'id' => $client->id,
                'nama_perusahaan' => $client->nama_perusahaan,
                'logo'  => $client->logo,
            ];
        }

        return response()->json([
            'message' => 'success',
            'status' => true,
            'results' => $results
        ]);
    }
}
