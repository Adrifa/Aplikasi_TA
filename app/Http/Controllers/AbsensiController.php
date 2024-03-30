<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\SettingJam;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function index()
    {
        $absensis  = DB::table('absensis as a')
                    ->leftJoin('pegawais as b', 'b.id', '=', 'a.idpegawais')
                    ->select('a.*', 'b.*')
                    ->orderBy('a.tanggal', 'DESC')
                    ->get();

        // $absensi = Absensi::all();
        return view('dashboard/absensi', compact('absensis'));
    }
    public function create()
    {
    }
    public function store()
    {
    }
    public function edit()
    {
    }
    public function update()
    {
    }
    public function destroy()
    {
    }


}
