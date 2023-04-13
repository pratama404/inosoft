<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::all();
        return response()->json($siswa);
    }

    public function show($id)
    {
        $siswa = Siswa::find($id);
        // hitung nilai rata-rata latihan soal, ulangan harian, UTS, dan ulangan semester menggunakan rumus yang telah ditentukan
        // $nilai = ...
        // $siswa->nilai = $nilai;
        return response()->json($siswa);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        return response()->json($siswa);
    }
    public function storeNilai(Request $request, $id)
    {

        $request->validate([
            'latihan_1' => 'required|numeric|min:0|max:100',
            'latihan_2' => 'required|numeric|min:0|max:100',
            'latihan_3' => 'required|numeric|min:0|max:100',
            'latihan_4' => 'required|numeric|min:0|max:100',
            'ulangan_harian_1' => 'required|numeric|min:0|max:100',
            'ulangan_harian_2' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'ulangan_semester' => 'required|numeric|min:0|max:100',
        ]);

        $siswa = Siswa::find($id);
        $siswa->nilai = [
            'latihan_1' => $request->latihan_1,
            'latihan_2' => $request->latihan_2,
            'latihan_3' => $request->latihan_3,
            'latihan_4' => $request->latihan_4,
            'ulangan_harian_1' => $request->ulangan_harian_1,
            'ulangan_harian_2' => $request->ulangan_harian_2,
            'uts' => $request->uts,
            'ulangan_semester' => $request->ulangan_semester,
        ];

        $siswa->save();

        return response()->json([
            'message' => 'Data nilai pelajaran siswa berhasil disimpan.',
            'siswa' => $siswa,
        ]);
    }
    public function showNilai(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $nilai = $siswa->nilai;

        $rata_latihan = ($nilai['latihan_1'] + $nilai['latihan_2'] + $nilai['latihan_3'] + $nilai['latihan_4']) / 4;
        $rata_ulangan_harian = ($nilai['ulangan_harian_1'] + $nilai['ulangan_harian_2']) / 2;
        $rata_uts = $nilai['uts'];
        $rata_ulangan_semester = $nilai['ulangan_semester'];

        $nilai_latihan = round($rata_latihan * 0.15, 2);
        $nilai_ulangan_harian = round($rata_ulangan_harian * 0.20, 2);
        $nilai_uts = round($rata_uts * 0.25, 2);
        $nilai_ulangan_semester = round($rata_ulangan_semester * 0.40, 2);

        return response()->json([
            'siswa' => $siswa,
            'nilai' => [
                'latihan' => $nilai_latihan,
                'ulangan_harian' => $nilai_ulangan_harian,
                'uts' => $nilai_uts,
                'ulangan_semester' => $nilai_ulangan_semester,
                'total' => $nilai_latihan + $nilai_ulangan_harian + $nilai_uts + $nilai_ulangan_semester,
            ],
        ]);
    }


}