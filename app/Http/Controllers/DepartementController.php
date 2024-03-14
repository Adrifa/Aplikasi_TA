<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departements = departement::all();
        return view('dashboard/departement', compact('departements'));      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/departement_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // Validasi input
            $request->validate([
                'namadepartement' => 'required',
                'keterangan' => 'required',
            ]);

            // Simpan data departement ke dalam database
            Departement::create([
                'namadepartement' => $request->input('namadepartement'),
                'keterangan' => $request->input('keterangan'),
            ]);

            return redirect()->route('departements.index')->with('success', 'departement added successfully.');
    //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departement = Departement::findOrFail($id);
        return view('dashboard/departement_edit', compact('departement'));
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
        // Validasi input
        $request->validate([
            'namadepartement' => 'required',
            'keterangan' => 'required',
        ]);

        // Temukan departement berdasarkan ID
        $departement = Departement::findOrFail($id);

        // Update data departement
        Departement::where('id', $id)->update([
            'namadepartement' => $request->input('namadepartement'),
            'keterangan' => $request->input('keterangan'),
        ]);


        // Redirect ke halaman index dan tampilkan pesan sukses
        return redirect()->route('departements.index')->with('success', 'departement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departement = departement::findOrFail($id);
        $departement->delete();

        return redirect()->route('departements.index')->with('success', 'departement deleted successfully.');//
    }
}
