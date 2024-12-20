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

    public function index(Request $request)
    {
        if ($request->dariTgl) {
            $dariTgl = $request->dariTgl;
        } else {
            $dariTgl = null;
        }

        if ($request->sampaiTgl) {
            $sampaiTgl = $request->sampaiTgl;
        } else {
            $sampaiTgl = null;
        }

        $absens = $this->absenRepository->getAbsen($request);
        return view('backoffice.absensi-data.absensi.index', compact(['absens', 'dariTgl', 'sampaiTgl']));
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
                    alert()->error('Gagal', 'Anda sudah absen hari ini');
                    return redirect('/karyawan');
                }

                $this->absenRepository->jamPulang();
                alert()->success('Berhasil', 'Absen Pulang Berhasil');
                return redirect('/karyawan');

            }

            $this->absenRepository->jamMasuk($request);
            alert()->success('Berhasil', 'Absen Masuk Berhasil');
            return redirect('/karyawan');

        } else {
            return redirect()->back()->with('qrCodeInvalid', 'Absen gagal qr code tidak sesuai');
        }

    }

    public function update(Request $request, $id)
    {
        $this->absenRepository->update($request, $id);
        alert()->success('Berhasil', 'Ubah Absen Berhasil');
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->absenRepository->delete($id);
        alert()->success('Berhasil', 'Hapus Absen Berhasil');
        return redirect()->back();
    }

    public function absen_wfh (Request $request)
    {
        $request->validate([
            'keterangan' => 'required|in:Hadir,Telat,Tidak Hadir,Izin',
        ],[
            'keterangan.required' => 'Keterangan harus dipilih'
        ]);
        $checkAbsenToday = $this->absenRepository->getAbsenTodayByUserId();

        if ($checkAbsenToday) {

            if ($checkAbsenToday->jam_masuk != null) {
                alert()->error('Gagal', 'Anda sudah absen hari ini');
                return redirect()->back();
            }
        }

        $this->absenRepository->wfh($request);
        alert()->success('Berhasil', 'Absen Masuk Berhasil');
        return redirect('/karyawan');

    }

}
