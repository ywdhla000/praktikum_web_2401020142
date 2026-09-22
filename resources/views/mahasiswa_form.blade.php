<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Data Mahasiswa</title>
</head>
<body>
    <h2>Formulir Data Mahasiswa</h2>

    {{-- Menampilkan pesan error validasi server-side --}}
    @if ($errors->any())
        <div>
            <p><strong>Terjadi kesalahan input:</strong></p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Menampilkan data sukses jika validasi berhasil --}}
    @if (session('success'))
        <div>
            <p><strong>{{ session('success') }}</strong></p>
            <p>NIM: {{ session('data')['nim'] }}</p>
            <p>Nama: {{ session('data')['nama'] }}</p>
            <p>Email: {{ session('data')['email'] }}</p>
            <p>Usia: {{ session('data')['usia'] }} tahun</p>
        </div>
        <hr>
    @endif

    {{-- Form input mahasiswa --}}
    <form action="{{ url('/mahasiswa_form') }}" method="POST">
        @csrf

        <div>
            <label for="nim">NIM:</label><br>
            <input type="text" id="nim" name="nim" value="{{ old('nim') }}">
        </div>
        <br>

        <div>
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}">
        </div>
        <br>

        <div>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" value="{{ old('email') }}">
        </div>
        <br>

        <div>
            <label for="usia">Usia:</label><br>
            <input type="text" id="usia" name="usia" value="{{ old('usia') }}">
        </div>
        <br>

        <button type="submit">Kirim Data</button>
    </form>
</body>
</html>