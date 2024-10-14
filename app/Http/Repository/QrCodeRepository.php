<?php

namespace App\Http\Repository;

use App\Models\QrCode;

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

    public function store($request)
    {
        try {
            $qrcode = rand(1111111111, 9999999999);

            $qrCode = new QrCode;            
            $qrCode->qrcode = $qrcode;
            $qrCode->save();
            return $qrCode;            
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}