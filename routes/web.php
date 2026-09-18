<?php

use Illuminate\Support\Facades\Route;

Route::get('/praktikum', function(){
    $nama = 'Atsilah Halimatus S';
    $nilai = [60, 70, 65, 75, 70];
    
    $hitungrataRata = function(array $data): float{
        $total = 0;
        foreach($data as $angka){
            $total += $angka;
        }
        return $total / count($data);
    };
    
    $rataRata = $hitungrataRata($nilai);
    if($rataRata >= 75){
        $status = 'Lulus';
    }else{
        $status = 'Perlu Perbaikan';
    }
    
    return view('praktikum', compact(
        'nama', 'nilai', 'rataRata', 'status'
    ));
    });