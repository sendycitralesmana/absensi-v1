<?php

namespace App\Http\Controllers;

use App\Http\Repository\QrCodeRepository;
use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $qrcodes = $this->qrCodeRepository->getQrCode();
            $absens = Absen::get();

            return view('backoffice.absensi-data.qrcode.index2', compact(['qrcodes', 'absens']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create()
    {
        try {
            return view('backoffice.absensi-data.qrcode.create');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
