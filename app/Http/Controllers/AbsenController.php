<?php

namespace App\Http\Controllers;

use App\Http\Repository\AbsenRepository;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    private $absenRepository;

    public function __construct(AbsenRepository $absenRepository)
    {
        $this->absenRepository = $absenRepository;
    }

    public function index()
    {
        $absens = $this->absenRepository->getAbsen();
        return view('backoffice.absensi-data.absensi.index', compact('absens'));
    }

    public function absen (Request $request)
    {
        $qrcode = QrCode::first();
        $qr = $request->qrcode;
        $data = $qrcode->qrcode;
        $checkAbsenToday = $this->absenRepository->getAbsenTodayByUserId();

        if ($qr == $data) {

            
            if ($checkAbsenToday) {

                if ($checkAbsenToday->jam_pulang != null) {
                    dd('Anda sudah absen hari ini');
                    // return redirect()->back()->with('sukses', 'Anda sudah absen hari ini');
                }
                
                $this->absenRepository->jamPulang();
                dd('jamPulang');
                // return redirect()->back()->with('pulang', 'Absen berhasil');
                
            }
            
            $this->absenRepository->jamMasuk($request);
            dd('jamMasuk');
            // return redirect()->back()->with('masuk', 'Absen berhasil');

        } else {
            return redirect()->back()->with('qrCodeInvalid', 'Absen gagal qr code tidak sesuai');
        }

    }

}
