<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\id;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            'siswas' => Siswa::all()
        ]);
    }

    public function siswaPresensi($id)
    {
        // Ambil siswa berdasarkan id
        $siswa = Siswa::findOrFail($id);

        // Ambil semua presensi yang dimiliki oleh siswa tersebut
        $presensis = $siswa->presensis;

        return view('presensi', compact('siswa', 'presensis'));
    }

    public function tambah()
    {
        return view('data.tambah');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'nisn' => 'required',
            'ttl' => 'required',
            'alamat' => 'required|string',
        ]);

        $simpan = new Siswa();
        $simpan->nama = $request->nama;
        $simpan->jk = $request->jk;
        $simpan->nisn = $request->nisn;
        $simpan->ttl = $request->ttl;
        $simpan->alamat = $request->alamat;
        $simpan->save();
        return redirect()->route('home');
    }

    public function editSiswa(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'nisn' => 'required',
            'ttl' => 'required',
            'alamat' => 'required|string',
        ]);

        $simpan = Siswa::findOrFail($id);
        $simpan->nama = $request->nama;
        $simpan->jk = $request->jk;
        $simpan->nisn = $request->nisn;
        $simpan->ttl = $request->ttl;
        $simpan->alamat = $request->alamat;
        $simpan->save();
        return redirect()->route('home');
    }

    public function presensi($id)
    {
        return view('data.presensi')->with([
            'siswa' => Siswa::findOrFail($id)
        ]);
    }

    public function masuk(Request $request, $id)
    {
        $request->validate([
            'kehadiran' => 'required',
            'hari' => 'required',
        ]);

        $simpan = new Presensi();
        $simpan->siswa_id = $id;
        $simpan->hari = $request->hari;
        $simpan->kehadiran = $request->kehadiran;
        $simpan->keterangan = $request->keterangan;
        $simpan->save();
        return redirect()->route('presensi.siswa', $id);
    }

    public function editTambah ($id)
    {
        return view('data.edittambah')->with([
            'siswa' => Siswa::findOrFail($id)
        ]);
    }

    public function hapusSiswa($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('home');
    }

    public function hapusPresensi($id)
    {
        $presensi = Presensi::findOrFail($id);
        $siswa_id = $presensi->siswa_id;
        $presensi->delete();

        return redirect()->route('presensi.siswa', $siswa_id)->with('success', 'Presensi berhasil dihapus');
    }
}
