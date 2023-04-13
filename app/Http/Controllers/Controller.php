<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        return response()->json($siswa);
    }

    public function show($id)
    {
        $siswa = Siswa::with('kelas')->find($id);
        return response()->json($siswa);
    }

    public function store(Request $request)
    {
        $siswa = Siswa::create($request->all());
        return response()->json($siswa, 201);
    }
}
