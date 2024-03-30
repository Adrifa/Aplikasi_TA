<?php

namespace App\Http\Controllers;

use App\Models\SettingJam;
use Illuminate\Http\Request;

class SettingJamController extends Controller
{
    public function index()
    {
        $settingjams = SettingJam::all();
        return view('dashboard.settingjam', compact('settingjams'));
    }

    public function create()
    {
        return view('dashboard.settingjam_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namasetting' => 'required',
            'jammasuk' => 'required',
            'jamkeluar' => 'required',
        ]);

        SettingJam::create($request->all());


        return redirect()->route('settingjams.index')
                         ->with('success','SettingJam created successfully.');
    }

    public function show(SettingJam $settingjam)
    {
        return view('dashboard.settingjam.show', compact('settingjam'));
    }

    public function edit(SettingJam $settingjam)
    {
        return view('dashboard.settingjam_edit', compact('settingjam'));
    }

    public function update(Request $request, SettingJam $settingjam)
    {
        $request->validate([
            'namasetting' => 'required',
            'jammasuk' => 'required',
            'jamkeluar' => 'required',
        ]);

        $settingjam->update($request->all());

        return redirect()->route('settingjams.index')
                         ->with('success','SettingJam updated successfully');
    }

    public function destroy(SettingJam $settingjam)
    {
        $settingjam->delete();

        return redirect()->route('settingjams')
                         ->with('success','SettingJam deleted successfully');
    }
}
