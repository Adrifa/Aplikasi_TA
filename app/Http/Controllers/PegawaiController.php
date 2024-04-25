<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departement;
use App\Models\Pegawai;
use App\Models\StatusJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('dashboard/pegawai', compact('pegawais'));        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departements = Departement::all();
        $statusjabatans = StatusJabatan::all();
        return view('dashboard.pegawai_create', compact('departements', 'statusjabatans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // dd($request);
        $request->validate([
            'namapegawai' => 'required',
            'hp' => 'required',
            'alamat' => 'required',
            'tgllahir' => 'required',
            'rfid' => 'required|unique:pegawais',
            'email' => 'required|email|unique:pegawais',
            'password' => 'required',
            'iddepartement' => 'required',
            'idstatusjabatan' => 'required',
        ]);

    //    try {
            // Simpan data pegawai ke dalam database
            Pegawai::create([
                'namapegawai' => $request->input('namapegawai'),
                'hp' => $request->input('hp'),
                'alamat' => $request->input('alamat'),
                'tgllahir' => $request->input('tgllahir'),
                'rfid' => $request->input('rfid'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
               'iddepartement' => $request->input('iddepartement'),
            'idstatusjabatan' => $request->input('idstatusjabatan'),
            ]);

            // Redirect ke halaman yang sesuai
            return redirect()->route('pegawais.index'); // Ganti 'nama_route' dengan nama route yang sesuai
     //   } catch (\Exception $e) {
            // Tangani error jika terjadi
      //      return back()->withError($e->getMessage())->withInput();
    //    }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $departements = Departement::all();
        $statusjabatans = StatusJabatan::all();
        return view('dashboard/pegawai_edit', compact('pegawai', 'departements', 'statusjabatans'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            try {
                // Validasi input
                $request->validate([
                    'namapegawai' => 'required',
                    'hp' => 'required',
                    'alamat' => 'required',
                    'tgllahir' => 'required',
                    'rfid' => 'required|unique:pegawais,rfid,' . $id,
                    'email' => 'required|email|unique:pegawais,email,' . $id,
                    'password' => 'required',
                   'iddepartement' => 'required',
                   'idstatusjabatan' => 'required',
                ]);

                // Temukan pegawai berdasarkan ID
                $pegawai = Pegawai::findOrFail($id);
                $centang = $request->input('centang');
                if($centang==1 OR $centang !=null){
                // Update data pegawai
                Pegawai::where('id', $id)->update([
                    'namapegawai' => $request->input('namapegawai'),
                    'hp' => $request->input('hp'),
                    'alamat' => $request->input('alamat'),
                    'tgllahir' => $request->input('tgllahir'),
                    'rfid' => $request->input('rfid'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                    'iddepartement' => $request->input('iddepartement'),
                    'idstatusjabatan' => $request->input('idstatusjabatan'),
                ]);
                }else{
                    // Update data pegawai
                    Pegawai::where('id', $id)->update([
                        'namapegawai' => $request->input('namapegawai'),
                        'hp' => $request->input('hp'),
                        'alamat' => $request->input('alamat'),
                        'tgllahir' => $request->input('tgllahir'),
                        'rfid' => $request->input('rfid'),
                        'email' => $request->input('email'),
                        'iddepartement' => $request->input('iddepartement'),
                        'idstatusjabatan' => $request->input('idstatusjabatan'),
                    ]);
                }


                // Redirect ke halaman index dan tampilkan pesan sukses
                return redirect()->route('pegawais.index')->with('success', 'Pegawai updated successfully.');


            } catch (\Exception $e) {
                // Log pesan kesalahan
                Log::error('Error during Pegawai update: ' . $e->getMessage());

                // Redirect ke halaman index dan tampilkan pesan kesalahan
                return redirect()->route('pegawais.index')->with('error', 'Failed to update Pegawai.');
            }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();

        return redirect()->route('pegawais.index')->with('success', 'Pegawai deleted successfully.');//
    }
}
