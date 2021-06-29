<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Kontak;
use Session;
use Validator;

class Login extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function cek(Request $req){
        $this->validate($req,[
        'username'=>'required',
        'password'=>'required'
        ]);
        $proses = Kontak::where('username',$req->username)->where('password',md5($req->password));
        if($proses->count()>0){
            $data = $proses->first();
            Session::put('id_kontak', $data->id_kontak);
            Session::put('username', $data->username);
            Session::put('password', $data->password);
            Session::put('nama', $data->nama);
            Session::put('login_status', true);
            return redirect('dashboard');
        } else {
            Session::flash('alert_pesan', 'Username dan password Invalid');
            return redirect('login');
        }
    }
    
    public function registration(){
        return view('auth.registration');
    }

    public function logout(){
        Session::flush();
        return redirect('login');
    }
    
}
