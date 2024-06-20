<?php

namespace App\Http\Controllers;
// Impor model Absensi jika belum diimpor
use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\pegawai;
use App\Models\SettingJam;
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
        $request->validate([ 'rfid' => 'required', ]);
        $rfid = $request->input('rfid');
        //mengambil id di table pegawais
        // Cari pegawai berdasarkan RFID
        $pegawai = Pegawai::where('rfid', $rfid)->first();
       // $jamsekarang = '17:20:00';
        $jamsekarang = date('H:i:s');
        //$jamsekarang = date('17:30:00');
        //ambildata di setting waktu
        $settingwaktu = 'settingwaktu';
        $status = SettingJam::where('namasetting', $settingwaktu)->first();
        $jammasukawal = $status->jammasukawal;
        $jammasukakhir = $status->jammasukakhir;
        $jamkeluarawal = $status->jamkeluarawal;
        $jamkeluarakhir = $status->jamkeluarakhir;
        if ($jamsekarang >= $jammasukawal && $jamsekarang <= $jammasukakhir) {
            $statusabsen = 'masuk';
        } elseif ($jamsekarang >= $jamkeluarawal && $jamsekarang <= $jamkeluarakhir) {
            $statusabsen = 'keluar';
        } elseif ($jamsekarang > $jammasukakhir && $jamsekarang < $jamkeluarawal) {
            $statusabsen = 'terlambat'; // Assuming 'terlambat' means 'late' in this context
        } else {
            $statusabsen = 'error';
        }
        // Periksa apakah pegawai ditemukan
        if ($pegawai) {
            // Jika ditemukan, ambil ID pegawai
            $pegawaiId = $pegawai->id;
            $namapegawai = $pegawai->namapegawai;
            $tanggal = date('Y-m-d'); // Mendapatkan tanggal saat ini dalam format 'Y-m-d'
            $jam = date('H:i:s'); // Mendapatkan waktu saat ini dalam format 'H:i:s'
            $alert = 'success';
            $pesan = 'Anda Berhasil Absen';
            //insert database
            $absensi = Absensi::create([
                'idpegawais' => $pegawaiId,
                'tanggal' =>  $tanggal,
                'jam' => $jam,
                'status' => $statusabsen,
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
