<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class Jabatancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jabatan::all();
        return view('jabatan.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jabatan = new Jabatan();
        $jabatan->nama = $request->nama;
        $jabatan->per_hari = $request->per_hari;
        $jabatan->lemburan = $request->lemburan;
        $jabatan->gaji_bulan = $request->gaji_bulan;
        $jabatan->save();

        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Jabatan::select('*')->whereid($id)->first();
        return view('jabatan.modaledit', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $jabatan = Jabatan::find($request->id);
        $jabatan->nama = $request->nama;
        $jabatan->per_hari = $request->per_hari;
        $jabatan->lemburan = $request->lemburan;
        $jabatan->gaji_bulan = $request->gaji_bulan;
        $jabatan->update();

        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();

        return response()->json(['alertdelete' => true]);
    }
}
