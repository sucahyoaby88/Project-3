<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kontak;
use Illuminate\Support\Facades\Validator;

class Kontakcontroller extends Controller
{
    public function store(Request $req){
        $validator = Validator::make($req->all(),
        [
            'nama'=>'required',
            'email'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan = Kontak::create([
            'nama'=>$req->nama,
            'email'=>$req->email,
            'nohp'=>$req->nohp,
            'alamat'=>$req->alamat,
            'username'=>$req->username,
            'password'=>md5($req->password),
            'id_kategori'=>$req->id_kategori

        ]);
        if($simpan){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }

    public function show(){
        $data_kontak = Kontak::get();
        return Response()->json($data_kontak);
    }

    public function show2(){
        $data_kontak = Kontak::join('kategori', 'kategori.id', 'kontak.id_kategori')->get();
        return Response()->json($data_kontak);
    }

    public function edit($id,Request $req){
        $validator = Validator::make($req->all(),
        [
            'nama'=>'required',
            'email'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $edit = Kontak::where('id_kontak', $id)->update([
            'nama'=>$req->nama,
            'email'=>$req->email,
            'nohp'=>$req->nohp,
            'alamat'=>$req->alamat,
            'username'=>$req->username,
            'password'=>md5($req->password),
            'id_kategori'=>$req->id_kategori
        ]);
        if($edit){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
}
