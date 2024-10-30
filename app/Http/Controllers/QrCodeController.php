<?php

namespace App\Http\Controllers;

use App\Http\Repository\QrCodeRepository;
use App\Models\Absen;
use App\Models\QrCode;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class QrCodeController extends Controller
{

    private $qrCodeRepository;

    public function __construct(QrCodeRepository $qrCodeRepository)
    {
        $this->qrCodeRepository = $qrCodeRepository;
    }

    public function index()
    {
        try {
            $qrcode = $this->qrCodeRepository->getQrCode();
            $qr = QrCode::first();
            $absens = Absen::whereDate('created_at', now()->format('Y-m-d'))->get();

            if ($qrcode->count() == 0) {
                $qrCode = null;
            } else {
                $qrCode = FacadesQrCode::size(300)->generate($qr->qrcode);
            }

            return view('backoffice.absensi-data.qrcode.index2', compact(['qrcode', 'absens', 'qr', 'qrCode']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function generate()
    {
        try {
            
            // $this->qrCodeRepository->generate();

            $qrcode = QrCode::get();

            if ($qrcode->count() == 0) {
                $generate = new QrCode();
                $generate->qrcode = Str::random(40);
                $generate->save();
            } else {
                $generate = QrCode::first();
                $generate->qrcode = Str::random(40);
                $generate->save();
            }

            return redirect()->back()->with('generate', 'Generate Qr Code Berhasil');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
