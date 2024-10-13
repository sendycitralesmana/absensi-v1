<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('karyawan.index');
    }

    public function profile(){
        return view('karyawan.profile');
    }

    public function wfo(){
        return view('karyawan.absensi.wfo');
    }
    public function wfh(){
        return view('karyawan.absensi.wfh');
    }
}
