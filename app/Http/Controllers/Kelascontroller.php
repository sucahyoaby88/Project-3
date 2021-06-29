<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelasmodel;
use Illuminate\Support\Facades\Validator;

class Kelascontroller extends Controller
{
    public function store(Request $req){
        $validator = Validator::make($req->all(),
        [
            'nama_kelas'=>'required',
            'kelompok'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan = Kelasmodel::create([
            'nama_kelas'=>$req->nama_kelas,
            'kelompok'=>$req->kelompok
        ]);
        if($simpan){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
}
