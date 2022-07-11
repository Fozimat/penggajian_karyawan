<!DOCTYPE html>
<html>

<head>
    <title>Laporan Gaji Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('assets/images/logo.jpeg') }}" class="img-fluid"
        style="position: absolute; top:0px; width: 100px;" alt="">
    <div class="text-center">
        <h4 style="font-weight: bold;font-size: 24px;">PT Global Bintang Mandiri
        </h4>
        <p style="margin-top: -10px;font-size: 12px;">Jln. Yusuf Kahar, Tanjungpinang, Kode Pos: 2194323</p>
        <p style="margin-top: -15px;font-size: 12px;">Telp: (0771) 7008204. Fax. 08272727. Email:
            globalbintangmandiri@gmail.com</p>
    </div>
    <hr style="border: 1px solid rgba(0, 0, 0, 0.5);">
    <center>
        <h5>Laporan Gaji Karyawan</h4>
    </center>

    <table class='table table-bordered mt-4'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Bulan/Tahun</th>
                <th>Hadir</th>
                <th>Izin</th>
                <th>Sakit</th>
                <th>Tanpa Ket</th>
                <th>Bonus</th>
                <th>Total Gaji</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gaji as $g)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $g->karyawan->nama_karyawan }}</td>
                <td>{{ $g->karyawan->jabatan->nama_jabatan }}</td>
                <td>{{ \Carbon\Carbon::parse($g->bulan_tahun)->isoFormat(' MMMM Y') }}</td>
                <td class="text-center">{{ $g->total_tanpa_keterangan ?? 0}}</td>
                <td class="text-center">{{ $g->total_tanpa_keterangan ?? 0}}</td>
                <td class="text-center">{{ $g->total_tanpa_keterangan ?? 0}}</td>
                <td class="text-center">{{ $g->total_tanpa_keterangan ?? 0}}</td>
                <td>@currency($g->bonus)</td>
                <td>@currency($g->total_gaji)</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table>
        <tr>
            <td style="width: 200px;text-align: center;height: 130px;;">Dibuat oleh</td>
            <td style="width: 292px;"></td>
            <td style="width: 200px;text-align: center;">
                Tanjungpinang, {{ \Carbon\Carbon::now()->isoFormat('DD MMMM Y')}}
                <br>
                Mengetahui
            </td>
        </tr>
        <tr>
            <td style="width: 200px;text-align: center;">(Supervisor Keuangan)</td>
            <td style="width: 292px;"></td>
            <td style="width: 200px;text-align: center;">
                (Pimpinan)
            </td>
        </tr>
    </table>

</body>

</html>