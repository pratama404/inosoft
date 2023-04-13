<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::all();
        return response()->json($nilai);
    }

    public function show($id)
    {
        $nilai = Nilai::with('siswa')->find($id);
        return response()->json($nilai);
    }

    public function store(Request $request)
    {
        $nilai = Nilai::create($request->all());
        return response()->json($nilai, 201);
    }


}
