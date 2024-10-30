<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index() {
        $pengajuans = Pengajuan::get();
        $users = User::where('role_id', '!=', 1)->get();
        return view('backoffice.absensi-data.pengajuan.index', compact(['pengajuans', 'users']));
    }

    public function create(Request $request) {
        $pengajuan = new Pengajuan();
        $pengajuan->user_id = $request->user_id;
        $pengajuan->status = $request->status;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->tgl_mulai = $request->tgl_mulai;
        $pengajuan->tgl_selesai = $request->tgl_selesai;
        $pengajuan->save();
        return redirect()->back();
    }

    public function update(Request $request, $id) {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->status = $request->status;
        $pengajuan->keterangan = $request->keterangan;
        $pengajuan->tgl_mulai = $request->tgl_mulai;
        $pengajuan->tgl_selesai = $request->tgl_selesai;
        $pengajuan->update();
        return redirect()->back();
    }

    public function delete($id) {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->delete();
        return redirect()->back();
    }
}
