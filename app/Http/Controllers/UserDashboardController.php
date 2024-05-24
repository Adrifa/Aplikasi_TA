<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class UserDashboardController extends Controller
{
    protected $pegawai;

    public function __construct(Pegawai $pegawai)
    {
        $this->pegawai = $pegawai;
    }

    // Di dalam DashboardController
    public function index()
    {
        // Jumlah absensi hari ini
        $tanggalhariini = date('Y-m-d');

        // Menghitung total absensi
        $total = DB::table(DB::raw("(SELECT id FROM absensis WHERE tanggal = '$tanggalhariini' GROUP BY id) AS grouped_absensis"))
            ->count();

        // Total terlambat hari ini
        $terlambat = DB::table(DB::raw("(SELECT id FROM absensis WHERE tanggal = '$tanggalhariini' AND status='terlambat' GROUP BY id) AS grouped_absensis"))
            ->count();

        // Menghitung jumlah total pegawai
        $jumlahpegawai = DB::table('pegawais')->count();
        $bulan = date('m');
        $tahun = date('Y');
        // Pegawai terbaik
        $pegawaiterbaik = DB::table('absensis')
            ->select('idpegawais as id', DB::raw('COUNT(*) as total'))
            ->where('status', 'masuk')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->groupBy('idpegawais')
            ->orderBy('total', 'DESC')
            ->get();

        $pegawaiterburuk = DB::table('absensis')
            ->select('idpegawais as id', DB::raw('COUNT(*) as total'))
            ->where('status', 'terlambat')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->groupBy('idpegawais')
            ->orderBy('total', 'DESC')
            ->get();


        $ulangtahun = DB::table('pegawais')
            ->whereMonth('tgllahir', $bulan)
            ->get();

        $pegawaiterburuk = DB::table('absensis')
            ->select('idpegawais as id', DB::raw('COUNT(*) as total'))
            ->where('status', 'terlambat')
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->groupBy('idpegawais')
            ->orderBy('total', 'DESC')
            ->get();
        //jumlah masuk tepat
        $data_tepat = [];
        for ($i = 1; $i <= 12; $i++) {
            $totalMasuk = DB::table('absensis')
                ->where('status', 'masuk')
                ->whereMonth('tanggal', $i)
                ->whereYear('tanggal', $tahun)
                ->count();

            $data_tepat[] = $totalMasuk;
        }

        $data_terlambat = [];
        for ($i = 1; $i <= 12; $i++) {
            $totalMasuk = DB::table('absensis')
                ->where('status', 'terlambat')
                ->whereMonth('tanggal', $i)
                ->whereYear('tanggal', $tahun)
                ->count();

            $data_terlambat[] = $totalMasuk;
        }

        // Kirim data ke view
        return view('user.index', [
            'total' => $total,
            'data_tepat' => $data_tepat,
            'data_terlambat' => $data_terlambat,
            'terlambat' => $terlambat,
            'ulangtahun' => $ulangtahun,
            'pegawaiterburuk' => $pegawaiterburuk,
            'jumlahpegawai' => $jumlahpegawai,
            'pegawaiterbaik' => $pegawaiterbaik,
            'pegawaiModel' => $this->pegawai,
        ]);
    }
}
