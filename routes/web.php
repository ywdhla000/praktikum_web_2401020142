<?php

use Illuminate\Support\Facades\Route;

Route::get('/latihan-php',function(){
    $nama = 'Atsilah Halimatus S';
    $nilai = [66,75,49,51,55];

    $hitungRatarata = function (array $data): float{
        $total = 0;
        foreach ($data as $angka){
            $total += $angka;
        }
        return $total / count($data);
    };

    $rataRata = $hitungRatarata($nilai);
    if ($rataRata >= 75){
        $status = 'Lulus';
    }else{
        $status = 'Perlu Perbaikan';
    }

    return view('latihan-php', compact(
        'nama','nilai', 'rataRata', 'status'
    ));
});