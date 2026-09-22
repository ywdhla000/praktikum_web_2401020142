<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/praktikum', function () {
    $nama = 'Atsilah Halimatus S';
    $nilai = [60, 70, 65, 75, 70];
    
    $hitungrataRata = function (array $data): float {
        $total = 0;
        foreach ($data as $angka) {
            $total += $angka;
        }
        return $total / count($data);
    };
    
    $rataRata = $hitungrataRata($nilai);
    if ($rataRata >= 75) {
        $status = 'Lulus';
    } else {
        $status = 'Perlu Perbaikan';
    }
    
    return view('praktikum', compact('nama', 'nilai', 'rataRata', 'status'));
});

Route::get('/mahasiswa_form', function () {
    return view('mahasiswa_form');
});

Route::post('/mahasiswa_form', function (Request $request) {
    $request->merge([
        'nim' => trim($request->nim),
    ]);

    $validated = $request->validate([
        'nim'   => 'required|digits_between:8,12',
        'nama'  => 'required|string|max:100',
        'email' => 'required|email',
        'usia'  => 'required|integer|min:17|max:100',
    ], [
        'nim.required'          => 'Field NIM wajib diisi.',
        'nim.digits_between'    => 'NIM harus berupa angka sepanjang 8–12 digit.',
        'nama.required'         => 'Field Nama wajib diisi.',
        'email.required'        => 'Field Email wajib diisi.',
        'email.email'           => 'Format email tidak valid.',
        'usia.required'         => 'Field Usia wajib diisi.',
        'usia.integer'          => 'Usia harus berupa bilangan bulat.',
        'usia.min'              => 'Usia minimal harus 17 tahun.',
    ]);

    $dataBersih = [
        'nim'   => $validated['nim'],
        'nama'  => htmlspecialchars(strip_tags($validated['nama']), ENT_QUOTES, 'UTF-8'),
        'email' => filter_var($validated['email'], FILTER_SANITIZE_EMAIL),
        'usia'  => (int) $validated['usia'],
    ];

    return redirect('/mahasiswa_form')
        ->with('success', 'Data mahasiswa berhasil dikirim dan diverifikasi!')
        ->with('data', $dataBersih);
});