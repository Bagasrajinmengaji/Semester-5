<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;
class AlatController extends Controller
{
    /** nampilin semua alat medis **/
    public function index()
    {
        $alats = Alat::latest()->get();
        return view ('alat.index', compact('alats'));
    }

    /**
     * nampilin form untuk nambah alat baru (Create)
     */
    public function create()
    {
        return view('alat.create');
    }

    /**
     * nyimpen data baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required|string|max:100',
            'tahun' => 'required|digits:4|integer',
            'merek' => 'required|string|max:60',
            'lokasi' => 'required|string|max:10',
        ]);
        
        Alat::create($request->all());

        return redirect()->route('alat.index')->with('success','data baru udah di tambahin');
    }

    /**
     * nampilin detail 1 alat
     */
    public function show(string $id)
    {
        $alat = Alat::findOrFail($id);
        return view('alat.show',compact('alat'));
    }

    /**
     * form untuk edit data alat
     */
    public function edit(string $id)
    {
        $alat = Alat::findOrFail($id);
        return view('alat.edit',compact('alat'));
    }

    /**
     * untuk perbarui data alat di database kita
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_alat' => 'required|string|max:100',
            'tahun' => 'required|digits:4|integer',
            'merek' => 'required|string|max:60',
            'lokasi' => 'required|string|max:10',
        ]);

        $alat = Alat::findOrFail($id);
        $alat->update($request->all());

        return redirect()->route('alat.index')->with('success','data baru udah di masukin');
    }

    /**
     * nah destroy ini command untuk ngehapus data dari database
     */
    public function destroy(string $id)
    {
        $alat = Alat::findOrFail($id);
        $alat->delete();

        return redirect()->route('alat.index')->with('success','data berhasil di hapus');
    }
}
