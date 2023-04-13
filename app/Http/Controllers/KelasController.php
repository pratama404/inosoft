<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return response()->json($kelas);
    }

    public function show($id)
    {
        $kelas = Kelas::find($id);
        return response()->json($kelas);
    }

    public function store(Request $request)
    {
        $kelas = Kelas::create($request->all());
        return response()->json($kelas, 201);
        $kelas = new Kelas();
        $kelas->nama = $request->nama;
        $kelas->jurusan = $request->jurusan;
        $kelas->save();

        return response()->json(['message' => 'Kelas berhasil disimpan.'], 201);
    }
    
}
