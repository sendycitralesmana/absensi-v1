<?php

namespace App\Http\Repository;

use App\Models\QrCode;
use Illuminate\Support\Str;

class QrCodeRepository
{

    public function getQrCode()
    {
        try {
            return QrCode::get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function generate()
    {
        try {
            $qrcode = Str::random(40);
            $qrCode = new QrCode;            
            $qrCode->qrcode = $qrcode;
            $qrCode->save();
            return $qrCode;            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}