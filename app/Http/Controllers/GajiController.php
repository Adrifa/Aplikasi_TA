<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Pegawai;
use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\StatusJabatan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GajiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('dashboard/gaji', compact('pegawais')); // Tampilkan daftar gaji
    }

    public function create()
    {
        // Tampilkan formulir untuk membuat gaji baru
    }

    public function store(Request $request)
    {
        // Simpan data gaji yang baru
    }

    public function show($id)
    {
        // Tampilkan detail gaji berdasarkan ID
    }

    public function edit($id)
    {

        $pegawai = DB::table('pegawais as a')
                    ->leftJoin('departements as b', 'b.id', '=', 'a.iddepartement')
                    ->leftJoin('statusjabatan as c', 'c.id', '=', 'a.idstatusjabatan')
                    ->select('a.*', 'b.*', 'c.*')
                    ->where('a.id', '=', $id)
                    ->first();
            /*
            if ($pegawai) {
                $namapegawai = $pegawai->namapegawai;
            } else {
                // Handle jika tidak ada hasil yang ditemukan
            }*/
        $departements = Departement::all();
        $statusjabatans = StatusJabatan::all();
        //data absensis bulan ini
        $bulan = date('m');
        $tahun = date('Y');
        //dd($bulan);
        $absensis  = DB::table('absensis as a')
                        ->leftJoin('pegawais as b', 'b.id', '=', 'a.idpegawais')
                        ->select('a.*', 'b.*')
                        ->where('b.id', '=', $id) // Menambahkan kondisi where
                        ->whereRaw('MONTH(a.tanggal) = ?', [$bulan])
                        ->whereRaw('YEAR(a.tanggal) = ?', [$tahun])
                        ->orderBy('a.tanggal', 'DESC')
                        ->get();
        //array total terlambat
        $b=[];
        return view('dashboard/gaji_edit', compact('pegawai', 'departements', 'statusjabatans', 'absensis', 'b'));
      // Tampilkan formulir untuk mengedit gaji berdasarkan ID
    }

    public function update(Request $request, $id)
    {
        // Simpan perubahan pada gaji yang telah diubah
    }

    public function destroy($id)
    {
        // Hapus gaji berdasarkan ID
    }

    public function cekbulan(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        $id = $request->input('id');

        $pegawai = DB::table('pegawais as a')
        ->leftJoin('departements as b', 'b.id', '=', 'a.iddepartement')
        ->leftJoin('statusjabatan as c', 'c.id', '=', 'a.idstatusjabatan')
        ->select('a.*', 'b.*', 'c.*')
        ->where('a.id', '=', $id)
            ->first();

        $departements = Departement::all();
        $statusjabatans = StatusJabatan::all();

        $absensis  = DB::table('absensis as a')
        ->leftJoin('pegawais as b', 'b.id', '=', 'a.idpegawais')
        ->select('a.*', 'b.*')
        ->where('b.id', '=', $id) // Menambahkan kondisi where
            ->whereRaw('MONTH(a.tanggal) = ?', [$bulan])
            ->whereRaw('YEAR(a.tanggal) = ?', [$tahun])
            ->orderBy('a.tanggal', 'DESC')
            ->get();
        //array total terlambat
        $b = [];
        return view('dashboard/gaji_edit', compact('pegawai', 'departements', 'statusjabatans', 'absensis', 'b'));
    }
}
