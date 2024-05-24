<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class LaporanController extends Controller
{
    //
    function index(){

        return view('dashboard/laporan');
    }
    public function cek(Request $request)
    {
        $request->validate([
            'bln' => 'required',
            'thn' => 'required',

        ]);
        $bln = $request->input('bln');
        $thn = $request->input('thn');

        $results = DB::table('pegawais as a')
        ->leftJoin('absensis as b', 'b.idpegawais', '=', 'a.id')
        ->leftJoin('departements as c', 'c.id', '=', 'a.iddepartement')
        ->leftJoin('statusjabatan as d', 'd.id', '=', 'a.idstatusjabatan')
        ->select(
            'a.id',
            'a.namapegawai',
            'd.gaji',
            DB::raw('COALESCE(SUM(CASE WHEN b.status = "masuk" THEN 1 ELSE 0 END), 0) AS masuk'),
            DB::raw('COALESCE(SUM(CASE WHEN b.status = "terlambat" THEN 1 ELSE 0 END), 0) AS terlambat'),
            DB::raw('COALESCE(SUM(CASE WHEN b.status = "keluar" THEN 1 ELSE 0 END), 0) AS keluar')
        )
        ->whereYear('b.tanggal', $thn)
        ->whereMonth('b.tanggal', $bln)
        ->groupBy('a.id', 'a.namapegawai', 'd.gaji')
        ->get();



        return view('dashboard/laporan_view', compact('results'));


        //return ('dashboard/laporan');
    }
}
