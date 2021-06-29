<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswamodel;
use App\Prestasi;
use Auth;
use Illuminate\Support\Facades\Validator;

class Siswacontroller extends Controller
{

    public function tampil_siswa(){
        $data_siswa = Siswamodel::join('kelas', 'kelas.id', 'siswa.id_kelas')->get();
        return Response()->json($data_siswa);
        
    }

    public function show(){
        $data_siswa = Siswamodel::get();
        $arr_data = array();
        foreach($data_siswa as $ds) {
            $prestasi = Prestasi::where('id_siswa', $ds->id)->get();
            $arr_prestasi = array();
            foreach($prestasi as $p){
                $arr_prestasi[] = array(
                    'nama_prestasi' => $p->nama_prestasi,
                    'tingkat' => $p->tingkat,
                    'juara' => $p->juara
                );
            }

            $arr_data[] = array(
            'nama_siswa'=>$ds->nama_siswa,
            'tanggal_lahir'=>$ds->tanggal_lahir,
            'gender'=>$ds->gender,
            'alamat'=>$ds->alamat,
            'prestasi'=>$arr_prestasi,
            'id_kelas'=>$ds->id_kelas
            );
        
        }

        return Response()->json($arr_data);
    }

    public function store(Request $req){
        $validator = Validator::make($req->all(),
        [
            'nama_siswa'=>'required',
            'tanggal_lahir'=>'required',
            'gender'=>'required',
            'alamat'=>'required',
            'id_kelas'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $simpan = Siswamodel::create([
            'nama_siswa'=>$req->nama_siswa,
            'tanggal_lahir'=>$req->tanggal_lahir,
            'gender'=>$req->gender,
            'alamat'=>$req->alamat,
            'id_kelas'=>$req->id_kelas
        ]);
        if($simpan){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }

    public function update($id,Request $req){
        $validator = Validator::make($req->all(),
        [
            'nama_siswa'=>'required',
            'tanggal_lahir'=>'required',
            'gender'=>'required',
            'alamat'=>'required',
            'id_kelas'=>'required'
        ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $ubah = Siswamodel::where('id', $id)->update([
            'nama_siswa'=>$req->nama_siswa,
            'tanggal_lahir'=>$req->tanggal_lahir,
            'gender'=>$req->gender,
            'alamat'=>$req->alamat,
            'id_kelas'=>$req->id_kelas
        ]);
        if($ubah){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }

    public function destroy($id){
        $hapus = Siswamodel::where('id', $id)->delete();
        if($hapus){
            return Response()->json(['status'=>1]);
        }else{
            return Response()->json(['status'=>0]);
        }
    }
}

