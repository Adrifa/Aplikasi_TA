<?php

namespace App\Http\Controllers;
// Impor model Absensi jika belum diimpor
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\pegawai;
class ScanAbsensiController extends Controller
{
    public function index()
    {
        // $pegawais = Pegawai::all();
        //  return view('dashboard/pegawai', compact('pegawais'));
          return view('login.scan');

    }
    public function scanabsensi(Request $request)
    {
        // dd($request);
        $request->validate([
            'rfid' => 'required',
        ]);
        $rfid = $request->input('rfid');
        //mengambil id di table pegawais
        // Cari pegawai berdasarkan RFID
        $pegawai = Pegawai::where('rfid', $rfid)->first();

        // Periksa apakah pegawai ditemukan
        if ($pegawai) {
            // Jika ditemukan, ambil ID pegawai
            $pegawaiId = $pegawai->id;
            $namapegawai = $pegawai->namapegawai;
            $tanggal = $pegawai->tanggal;
            $jam = $pegawai->jam;

            $absensi = Absensi::create([
                'idpegawais' => $pegawaiId,
                'tanggal' => date('Y-m-d'),
                'jam' => date('H:i:s'),
            ]);
            // Lakukan sesuatu dengan ID pegawai...
           // return "ID Pegawai yang sesuai dengan RFID {$rfid} adalah {$pegawaiId}";

        } else {
            // Jika tidak ditemukan, kembalikan pesan error atau lakukan tindakan yang sesuai
            return "Tidak ada pegawai yang sesuai dengan RFID {$rfid}";
        }
    }
}
