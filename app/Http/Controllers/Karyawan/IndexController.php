<?php

namespace App\Http\Controllers\Karyawan;

use App\Http\Controllers\Controller;
use App\Http\Repository\AbsenRepository;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $absenRepository;

    public function __construct(AbsenRepository $absenRepository)
    {
        $this->absenRepository = $absenRepository;
    }
    public function index(){
        $absens = $this->absenRepository->getAbsenUserId();

        return view('karyawan.index', compact('absens'));
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
