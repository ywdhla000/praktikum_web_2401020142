USE praktikum_web_2401020142;

INSERT INTO program_studi (nama_prodi) VALUES
    ('Arsitektur'),
    ('Teknik Sipil');

INSERT INTO mahasiswa
    (nim, nama, email, usia, program_studi_id)
VALUES
    ('2401050142', 'Atsilah Halimatus S', '2401050142@student.umrah.ac.id', 20, 1),
    ('2401050001', 'Aulia Putri Kartika', '2401050001@student.umrah.ac.id', 19, 1),
    ('2401060002', 'Dimas Anggara', '2401060002@student.umrah.ac.id', 20, 2),
    ('2401060099', 'Akun Percobaan', 'percobaan@student.umrah.ac.id', 18, 2);


UPDATE mahasiswa
SET email = 'dimas@student.ac.id'
WHERE nim = '2401060002';

DELETE FROM mahasiswa
WHERE nim = '2401060099';

SELECT m.nim, m.nama, m.email, m.usia,
    p.nama_prodi
FROM mahasiswa AS m
JOIN program_studi AS p 
    ON p.id = m.program_studi_id
    ORDER BY m.nim;