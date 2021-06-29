<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class PageController extends Controller
{
//    public function __construct(){
//        $this->middleware('cek_login');
//    }

    public function dashboard(){
        return view('dashboard.index');
    }

    public function kontak(){
        return view('kontak.index');
    }
}
