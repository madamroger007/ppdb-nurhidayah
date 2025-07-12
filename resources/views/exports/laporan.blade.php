<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pendaftaran RA Nurhidayah</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
        th { background-color: #f3f4f6; }
        h2 { margin-bottom: 20px; }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Laporan Pendaftaran RA Nurhidayah Tahun {{ $year }}</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>NIK</th>
                <th>Nama Ayah</th>
                <th>Pekerjaan Ayah</th>
                <th>Nama Ibu</th>
                <th>Pekerjaan Ibu</th>
                <th>Verifikasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftar as $i => $p)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->tempat_lahir }}, {{ \Carbon\Carbon::parse($p->tgl_lahir)->format('d-m-Y') }}</td>
                <td>{{ $p->email ?? '-' }}</td>
                <td>{{ $p->no_hp }}</td>
                <td>{{ $p->jenis_kelamin }}</td>
                <td>{{ $p->agama }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->NIK }}</td>
                <td>{{ $p->nama_ayah }}</td>
                <td>{{ $p->pekerjaan_ayah }}</td>
                <td>{{ $p->nama_ibu }}</td>
                <td>{{ $p->pekerjaan_ibu }}</td>
                <td>{{ $p->verifikasi_data ? 'Lulus' : 'Tidak Lulus' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
