<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Jabatan;

class PegawaiController extends Controller
{

    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        $jabatans = Jabatan::all();
        return view('pegawai.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $validator= $request->validate([
            'nip' => 'required|min:5|max:5|unique:pegawais',
            'nama' => 'required',
            'jabatan_id' => 'required',
            'alamat' => 'required',
        ]);

        Pegawai::create($request->all());
        return redirect('pegawai')->with('sukses','Data berhasil disimpan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pegawai = Pegawai::find($id);
        $jabatans = Jabatan::all();
        return view('pegawai.edit', compact('pegawai','jabatans'));
    }

    public function update(Request $request, $id)
    {
        $validator= $request->validate([
            'nip' => 'required|min:5|max:5|unique:pegawais,nip,'.$id,
            'nama' => 'required',
            'jabatan_id' => 'required',
            'alamat' => 'required',
        ]);

        Pegawai::find($id)->update($request->all());
        return redirect('pegawai')->with('sukses','Data berhasil diubah');
    }

    public function destroy($id)
    {
        Pegawai::destroy($id);
        return redirect('pegawai')->with('sukses','Data berhasil dihapus');
    }
}
