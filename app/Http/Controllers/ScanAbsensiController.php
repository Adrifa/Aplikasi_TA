<?php

namespace App\Http\Controllers;
// Impor model Absensi jika belum diimpor
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\pegawai;
use Illuminate\Support\Carbon;
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
        date_default_timezone_set('Asia/Jakarta');
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
            $tanggal = date('Y-m-d'); // Mendapatkan tanggal saat ini dalam format 'Y-m-d'
            $jam = date('H:i:s'); // Mendapatkan waktu saat ini dalam format 'H:i:s'
            $alert = 'success';
            $pesan = 'Anda Berhasil Absen';
            $absensi = Absensi::create([
                'idpegawais' => $pegawaiId,
                'tanggal' =>  $tanggal,
                'jam' => $jam,
            ]);
            return view('login.scanabsensiview', compact('pegawaiId', 'namapegawai', 'tanggal', 'jam', 'alert', 'pesan'));


        } else {
            // Jika tidak ditemukan, kembalikan pesan error atau lakukan tindakan yang sesuai
            $pegawaiId = '';
            $namapegawai ='';
            $tanggal = '';
            $jam ='';
            $alert = 'danger';
            $pesan = 'Maaf. Data Tidak Ditemukan';
            return view('login.scanabsensiview', compact('pegawaiId', 'namapegawai', 'tanggal', 'jam', 'alert', 'pesan'));

        }
    }
}
