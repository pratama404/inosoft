<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Siswa extends Model
{
    // ...

    public function getNilaiMatpelAttribute()
    {
        $nilai = $this->nilai;
        $latihan = collect([$nilai['latihan_1'], $nilai['latihan_2'], $nilai['latihan_3'], $nilai['latihan_4']]);
        $rataLatihan = $latihan->avg();
        $ulanganHarian = collect([$nilai['ulangan_harian_1'], $nilai['ulangan_harian_2']]);
        $rataUlanganHarian = $ulanganHarian->avg();
        $uts = $nilai['uts'];
        $ulanganSemester = $nilai['ulangan_semester'];
        $nilaiMatpel = 0.15 * $rataLatihan + 0.2 * $rataUlanganHarian + 0.25 * $uts + 0.4 * $ulanganSemester;
        return $nilaiMatpel;
    }
}
