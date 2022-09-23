<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Support\Facades\Http; 

class ProvinsiController extends Controller
{
    public function fetch()
    {
        $response = Http::get('https://dev.farizdotid.com/api/daerahindonesia/provinsi');
        $provinsi = json_decode($response->body());
        $data = $provinsi->provinsi;
        foreach($data as $row){
            $prov = new Provinsi;
            $prov->id = $row->id;
            $prov->nama = $row->nama;
            $prov->save();
        }
        return "DONE";
    }

    public function index(){
        $prov = Provinsi::all();
        return view('index', ['prov' => $prov]);       
    }
}
