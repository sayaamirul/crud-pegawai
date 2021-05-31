<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pegawai.index', [
            'pegawai' => Pegawai::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create', [
            'golongan' => Golongan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => ['required'],
            'nip' => ['required', 'numeric', 'unique:pegawai,nip'],
            'golongan_id' => ['required', 'exists:golongan,id'],
            'email' => ['required', 'email', 'unique:pegawai,email'],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required', 'numeric'],
        ]);

        Pegawai::create($validatedData);

        session()->flash('success', 'Data Pegawai Berhasil Ditambahkan.');

        return redirect()->route('pegawai.index');
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
        return view('pegawai.edit', [
            'golongan' => Golongan::all(),
            'pegawai' => Pegawai::find($id)
        ]);
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
        $validatedData = $request->validate([
            'nama' => ['required'],
            'nip' => ['required', 'numeric', 'unique:pegawai,nip,' . $id],
            'golongan_id' => ['required', 'exists:golongan,id'],
            'email' => ['required', 'email', 'unique:pegawai,email,' . $id],
            'jenis_kelamin' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required', 'numeric'],
        ]);

        $pegawai = Pegawai::find($id);
        $pegawai->update($validatedData);

        session()->flash('success', 'Data Pegawai Berhasil Diperbarui.');

        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::find($id);
        $pegawai->delete();
    }
}
