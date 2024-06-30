<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return response()->json($mahasiswa);
    }

    public function show($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        return response()->json($mahasiswa);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nim' => 'required|string|unique:mahasiswas',
            'jurusan' => 'required|string',
            'fakultas' => 'required|string',
        ]);

        $mahasiswa = Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'jurusan' => $request->jurusan,
            'fakultas' => $request->fakultas,
        ]);

        return response()->json(['message' => 'Mahasiswa created successfully', 'data' => $mahasiswa], 201);
    }

    public function update(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $request->validate([
            'nama' => 'string',
            'nim' => 'string|unique:mahasiswas,nim,' . $mahasiswa->id,
            'jurusan' => 'string',
            'fakultas' => 'string',
        ]);

        $mahasiswa->nama = $request->nama ?? $mahasiswa->nama;
        $mahasiswa->nim = $request->nim ?? $mahasiswa->nim;
        $mahasiswa->jurusan = $request->jurusan ?? $mahasiswa->jurusan;
        $mahasiswa->fakultas = $request->fakultas ?? $mahasiswa->fakultas;
        $mahasiswa->save();

        return response()->json(['message' => 'Mahasiswa updated successfully', 'data' => $mahasiswa]);
    }

    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $mahasiswa->delete();

        return response()->json(['message' => 'Mahasiswa deleted successfully']);
    }
}
