<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>

<body>
    <h3 style="text-align: center;">[SMK Merdeka Belajar]</h3>
    <hr style="margin-bottom: 10px;">
    <table border="1" cellspacing="0" cellpading="5" style="width: 100%;">
        <thead>
            <tr>
                <th>No. Daftar</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Asal SMP</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $student->no_daftar }}</td>
                <td>{{ $student->nama }}</td>
                <td>{{ $student->GenderStatus }}</td>
                <td>{{ $student->alamat }}</td>
                <td>{{ $student->agama }}</td>
                <td>{{ $student->asal_smp }}</td>
                <td>{{ $student->jurusan }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
