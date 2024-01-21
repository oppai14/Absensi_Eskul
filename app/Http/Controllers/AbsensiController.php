<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;

class AbsensiController extends Controller
{
    // Menampilkan semua data absensi
    public function index()
    {
        $absensi = Absensi::all();
        return view('absensi.index', compact('absensi'));
    }
    public function dataTable(Request $request)
    {
        if ($request->ajax()) {
            $query = Absensi::query();
    
            // Cek apakah parameter 'nama' ada dalam permintaan
            if ($request->has('nama')) {
                $nama = $request->input('nama');
                $query->where('nama', 'like', '%' . $nama . '%');
            }
    
            // Lanjutkan untuk menambahkan kondisi filter berdasarkan parameter lain jika diperlukan
    
            $data = $query->get();
    
            return response()->json(['data' => $data]);
        }
    
        return view('absensi.index');
    }

    // Menampilkan formulir untuk menambahkan data absensi baru
    public function create()
    {
        return view('absensi.create');
    }

    // Menyimpan data absensi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        Absensi::create($request->all());

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil ditambahkan');
    }

    // Menampilkan formulir untuk mengedit data absensi
    public function edit(Absensi $absensi)
    {
        return view('absensi.edit', compact('absensi'));
    }

    // Mengupdate data absensi yang sudah ada di database
    public function update(Request $request, Absensi $absensi)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
        ]);

        $absensi->update($request->all());

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diperbarui');
    }

    // Menghapus data absensi dari database
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus');
    }
}
