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
        $date = Carbon::now()->format('d F Y');
        $katamotivasi = [
            "Kerja keras mengalahkan bakat ketika bakat tidak bekerja keras.",
            "Setiap langkah kecil yang kita ambil hari ini membawa kita lebih dekat ke tujuan besar kita.",
            "Kesuksesan tidak datang kepada mereka yang menunggu, tetapi kepada mereka yang bekerja keras dan berusaha tanpa henti.",
            "Jangan takut akan kegagalan; itu adalah batu loncatan menuju kesuksesan.",
            "Ketika kita menikmati apa yang kita lakukan, pekerjaan menjadi lebih ringan dan hasilnya lebih memuaskan.",
            "Setiap tantangan adalah kesempatan untuk tumbuh dan belajar menjadi lebih baik.",
            "Kerja keras adalah harga yang harus dibayar untuk mencapai mimpi besar.",
            "Keberhasilan adalah gabungan dari kerja keras, ketekunan, dan komitmen.",
            "Tidak ada yang tidak mungkin; semua bisa dicapai dengan tekad dan usaha yang sungguh-sungguh.",
            "Setiap hari adalah kesempatan baru untuk menjadi lebih baik dari kemarin."
        ];
        return view('login.scan', compact('date', 'katamotivasi'));
    }
    public function scanabsensi(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        // dd($request);
        $request->validate(['rfid' => 'required',]);
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
        $date = Carbon::now()->format('d F Y');
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
            $date = Carbon::now()->format('d F Y');

            $katamotivasi = [
                "Kerja keras mengalahkan bakat ketika bakat tidak bekerja keras.",
                "Setiap langkah kecil yang kita ambil hari ini membawa kita lebih dekat ke tujuan besar kita.",
                "Kesuksesan tidak datang kepada mereka yang menunggu, tetapi kepada mereka yang bekerja keras dan berusaha tanpa henti.",
                "Jangan takut akan kegagalan; itu adalah batu loncatan menuju kesuksesan.",
                "Ketika kita menikmati apa yang kita lakukan, pekerjaan menjadi lebih ringan dan hasilnya lebih memuaskan.",
                "Setiap tantangan adalah kesempatan untuk tumbuh dan belajar menjadi lebih baik.",
                "Kerja keras adalah harga yang harus dibayar untuk mencapai mimpi besar.",
                "Keberhasilan adalah gabungan dari kerja keras, ketekunan, dan komitmen.",
                "Tidak ada yang tidak mungkin; semua bisa dicapai dengan tekad dan usaha yang sungguh-sungguh.",
                "Setiap hari adalah kesempatan baru untuk menjadi lebih baik dari kemarin."
            ];

            return view('login.scanabsensiview', compact('pegawaiId', 'namapegawai', 'tanggal', 'jam', 'alert', 'pesan', 'date', 'katamotivasi'));
        } else {
            // Jika tidak ditemukan, kembalikan pesan error atau lakukan tindakan yang sesuai
            $pegawaiId = '';
            $namapegawai = '';
            $tanggal = '';
            $jam = '';
            $alert = 'danger';
            $pesan = 'Maaf. Data Tidak Ditemukan';

            $katamotivasi = [
                "Kerja keras mengalahkan bakat ketika bakat tidak bekerja keras.",
                "Setiap langkah kecil yang kita ambil hari ini membawa kita lebih dekat ke tujuan besar kita.",
                "Kesuksesan tidak datang kepada mereka yang menunggu, tetapi kepada mereka yang bekerja keras dan berusaha tanpa henti.",
                "Jangan takut akan kegagalan; itu adalah batu loncatan menuju kesuksesan.",
                "Ketika kita menikmati apa yang kita lakukan, pekerjaan menjadi lebih ringan dan hasilnya lebih memuaskan.",
                "Setiap tantangan adalah kesempatan untuk tumbuh dan belajar menjadi lebih baik.",
                "Kerja keras adalah harga yang harus dibayar untuk mencapai mimpi besar.",
                "Keberhasilan adalah gabungan dari kerja keras, ketekunan, dan komitmen.",
                "Tidak ada yang tidak mungkin; semua bisa dicapai dengan tekad dan usaha yang sungguh-sungguh.",
                "Setiap hari adalah kesempatan baru untuk menjadi lebih baik dari kemarin."
            ];
            return view('login.scanabsensiview', compact('pegawaiId', 'namapegawai', 'tanggal', 'jam', 'alert', 'pesan', 'date', 'katamotivasi'));
        }
    }
}
