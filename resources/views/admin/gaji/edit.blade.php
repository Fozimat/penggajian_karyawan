@extends('template.admin')

@section('title')
Edit Data Gaji
@endsection

@section('content')
<div class="row">

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Gaji</h4>
                <form class="forms-sample" action="{{ route('gaji.update', $gaji->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="bulan_tahun">Bulan/Tahun</label>
                        <input required type="month" class="form-control  @error('bulan_tahun') is-invalid @enderror"
                            id="bulan_tahun" name="bulan_tahun"
                            value="{{ \Carbon\Carbon::parse($gaji->bulan_tahun)->isoFormat('YYYY-MM') }}">
                        @error('bulan_tahun')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_karyawan">Nama Karyawan</label>
                        <select required class="form-control  @error('id_karyawan') is-invalid @enderror"
                            id="id_karyawan" name="id_karyawan">
                            <option value="">--Pilih--</option>
                            @foreach ($karyawan as $k)
                            <option value="{{ $k->id }}" {{ $k->id == $gaji->karyawan->id ? 'selected': '' }}>{{
                                $k->nama_karyawan }}</option>
                            @endforeach
                        </select>
                        @error('id_karyawan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="hadir">Total Hadir</label>
                                <input required type="number" class="form-control" id="hadir" name="hadir"
                                    value="{{ $gaji->total_gaji }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="izin">Total Izin</label>
                                <input required type="number" class="form-control" id="izin" name="izin"
                                    value="{{ $gaji->total_izin }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="sakit">Total Sakit</label>
                                <input required type="number" class="form-control" id="sakit" name="sakit"
                                    value="{{ $gaji->total_sakit }}">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="tanpa_ket">Total Tanpa Keterangan</label>
                                <input required type="number" class="form-control" id="tanpa_ket" name="tanpa_ket"
                                    value="{{ $gaji->total_tanpa_keterangan }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input required readonly type="text" class="form-control @error('jabatan') is-invalid @enderror"
                            id="jabatan" name="jabatan" value="{{ $gaji->karyawan->jabatan->nama_jabatan }}">
                        @error('jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gaji_perbulan">Gaji/bulan</label>
                        <input required readonly type="number"
                            class="form-control  @error('gaji_perbulan') is-invalid @enderror" id="gaji_perbulan"
                            name="gaji_perbulan" value="{{ $gaji->karyawan->jabatan->gaji_perbulan }}">
                        @error('gaji_perbulan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bonus">Bonus</label>
                        <input required type="number" class="form-control  @error('bonus') is-invalid @enderror"
                            id="bonus" name="bonus" value="{{ $gaji->bonus }}">
                        @error('bonus')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="total_gaji">Total Gaji</label>
                        <input required type="number" readonly
                            class="form-control  @error('total_gaji') is-invalid @enderror" id="total_gaji"
                            name="total_gaji" value="{{ $gaji->total_gaji }}">
                        @error('total_gaji')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> Ubah </button>
                    <input type="reset" class="btn btn-danger" value="Reset">
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('script')
<script>
    $('#id_karyawan').change(function() {
        let id_karyawan = $(this).val();
        $.ajax({
            type: 'get',
            url: '/admin/gaji/findJabatanGaji/' + id_karyawan,
            data: {'id': id_karyawan},
            dataType: 'json',
            success: function(data) {
                $('#jabatan').val(data[0].jabatan.nama_jabatan);
                $('#gaji_perbulan').val(data[0].jabatan.gaji_perbulan);
            }
        });
    });
    $('#bonus, #tanpa_ket').keyup(function() {
       hitungGaji();
    });

    function hitungGaji()
    {
        let tanpa_ket = $('#tanpa_ket').val();
        let bonus = $('#bonus').val();
        let gaji_bulan = $('#gaji_perbulan').val();
        let total_gaji = (parseInt(bonus) + parseInt(gaji_bulan)) - (parseInt(tanpa_ket) * 30000);
        $('#total_gaji').val(total_gaji);
    }
</script>
@endpush