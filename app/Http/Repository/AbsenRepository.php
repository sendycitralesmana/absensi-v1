<?php

namespace App\Http\Repository;

use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenRepository
{
    public function getAbsen(Request $request)
    {
        try {
            $absens = Absen::orderBy('created_at', 'desc');
            if ($request->dariTgl && $request->sampaiTgl) {
                $absens = $absens->whereBetween('created_at', [$request->dariTgl, $request->sampaiTgl]);
            }
            if ($request->dariTgl) {
                $absens = $absens->whereDate('created_at', $request->dariTgl);
            }
            return $absens->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function getAbsenUserId()
    {
        try {
            return Absen::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAbsenToday()
    {
        try {
            return Absen::whereDate('created_at', now()->format('Y-m-d'))->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getAbsenTodayByUserId()
    {
        try {
            return Absen::where('user_id', Auth::user()->id)->whereDate('created_at', now()->format('Y-m-d'))->first();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function jamMasuk($request)
    {
        try {
            $absen = new Absen;
            $absen->user_id = Auth::user()->id;
            $absen->jam_masuk = now();
            $absen->status = 'WFO';
            $absen->save();
            return $absen;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function wfh($request)
    {
        try {
            $absen = new Absen;
            $absen->user_id = Auth::user()->id;
            $absen->jam_masuk = now();
            $absen->status = 'WFH';
            $absen->keterangan = $request->keterangan;
            $absen->save();
            return $absen;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function jamPulang()
    {
        try {
            $absen = $this->getAbsenTodayByUserId(Auth::user()->id);
            $absen->jam_pulang = now();
            $absen->save();
            return $absen;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($request, $id)
    {
        try {
            $absen = Absen::find($id);
            $absen->jam_masuk = $request->jam_masuk;
            $absen->jam_pulang = $request->jam_pulang;
            $absen->status = $request->status;
            $absen->keterangan = $request->keterangan;
            $absen->save();
            return $absen;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $absen = Absen::find($id);
            $absen->delete();
            return $absen;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
