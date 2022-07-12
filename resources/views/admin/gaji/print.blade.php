<!DOCTYPE html>
<html>

<head>
    <title>Laporan Slip Gaji Karyawan</title>
    <style>
        .text-center {
            text-align: center;
        }

        table {
            font-size: 14px;
        }

        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <img src="{{ public_path('assets/images/logo.jpeg') }}" class="img-fluid"
        style="position: absolute; top:25px; width: 150px;" alt="">
    <div class="text-center">
        <h4 style="font-weight: bold;font-size: 28px;">PT Global Bintang Mandiri
        </h4>
        <p style="margin-top: -35px;">Jln. Yusuf Kahar, Tanjungpinang, Kode Pos: 2194323</p>
        <p style="margin-top: -15px;">Telp: (0771) 7008204. Fax. 08272727. Email: globalbintangmandiri@gmail.com</p>
    </div>
    <hr>

    <table>
        <tr>
            <td style="width: 150px;">Periode</td>
            <td>:</td>
            <td style="font-weight: bold;">{{ \Carbon\Carbon::parse($hasil->bulan_tahun)->isoFormat(' MMMM Y') }}</td>
        </tr>
        <tr>
            <td style="width: 150px;">Nama Karyawan</td>
            <td>:</td>
            <td>{{ $hasil->karyawan->nama_karyawan }}</td>
        </tr>
        <tr>
            <td style="width: 150px;">Alamat</td>
            <td>:</td>
            <td>{{ $hasil->karyawan->alamat }}</td>
        </tr>
        <tr>
            <td style="width: 150px;">No Telp</td>
            <td>:</td>
            <td>{{ $hasil->karyawan->telepon }}</td>
        </tr>
        <tr>
            <td style="width: 150px;">Jabatan</td>
            <td>:</td>
            <td>{{ $hasil->karyawan->jabatan->nama_jabatan }}</td>
        </tr>
    </table>

    <hr>
    <table>
        <tr>
            <td style="width: 500px;text-align: center;">Pembayaran</td>
            <td style="width: 500px;text-align: center;">Jumlah</td>
        </tr>
    </table>
    <hr>
    <table>
        <tr>
            <td style="width: 500px;">Gaji Pokok</td>
            <td style="width: 500px;text-align: right;">@currency($hasil->karyawan->jabatan->gaji_perbulan)</td>
        </tr>
        <tr>
            <td style="width: 500px;">Bonus</td>
            <td style="width: 500px;text-align: right;">@currency($hasil->bonus)</td>
        </tr>

    </table>
    <hr>
    <table>
        <tr>
            <td style="width: 500px;">Total Hadir</td>
            <td style="width: 500px;text-align: right;">{{ $hasil->total_hadir }} Hari</td>
        </tr>
        <tr>
            <td style="width: 500px;">Total Izin</td>
            <td style="width: 500px;text-align: right;">{{ $hasil->total_izin }} Hari</td>
        </tr>
        <tr>
            <td style="width: 500px;">Total Sakit</td>
            <td style="width: 500px;text-align: right;">{{ $hasil->total_sakit }} Hari</td>
        </tr>
        <tr>
            <td style="width: 500px;">Tanpa Keterangan ({{ $hasil->total_tanpa_keterangan }} Hari) </td>
            <td style="width: 500px;text-align: right;">@currency($hasil->total_tanpa_keterangan * 30000)</td>
        </tr>
    </table>
    <hr>
    <table>
        <tr>
            <td style="width: 500px;">Total Gaji</td>
            <td style="width: 500px;text-align: right;">@currency($hasil->total_gaji)</td>
        </tr>
    </table>
    <table style="margin-left: 200px;margin-top:10px;text-align: center;">
        <tr>
            <td>Tanjungpinang, {{ \Carbon\Carbon::now()->isoFormat('DD MMMM Y') }}</td>
        </tr>
        <tr>
            <td style="height: 25px;"></td>
        </tr>
        <tr>
            <td>(Supervisor Keuangan)</td>
        </tr>
    </table>

</body>

</html>