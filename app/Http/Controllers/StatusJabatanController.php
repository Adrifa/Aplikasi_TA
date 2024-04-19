<?php

namespace App\Http\Controllers;

use App\Models\StatusJabatan;
use Illuminate\Http\Request;

class StatusJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statusjabatans = StatusJabatan::all();
        return view('dashboard.statusjabatan', compact('statusjabatans'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.statusjabatan_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'namastatusjabatan' => 'required',
            'gaji' => 'required',
        ]);

        StatusJabatan::create($request->all());
        return redirect()->route('statusjabatan.index')
        ->with('success', 'Status created successfully.');       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.statusjabatan.show', compact('statusjabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusJabatan $statusjabatan)
    {
        return view('dashboard.statusjabatan_edit', compact('statusjabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StatusJabatan $statusjabatan)
    {
         //SELECT `id`, `namastatusjabatan`, `gaji`, `created_at`, `updated_at` FROM `statusjabatan` WHERE 1
        $request->validate([
            'namastatusjabatan' => 'required',
            'gaji' => 'required',
        ]);

        $statusjabatan->update($request->all());

        return redirect()->route('statusjabatan.index')
        ->with('success', 'Statusjabatan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusJabatan $statusjabatan)
    {
        $statusjabatan->delete();

        return redirect()->route('statusjabatan.index')
        ->with('success', 'Statusjabatan deleted successfully');        //
    }
}
