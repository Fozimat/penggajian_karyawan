@extends('template.admin')

@section('title')
Tambah Data Gaji
@endsection

@section('content')
<div class="row">

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Gaji</h4>
                <form class="forms-sample" action="{{ route('gaji.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_karyawan">Nama Karyawan</label>
                        <select required class="form-control  @error('id_karyawan') is-invalid @enderror"
                            id="id_karyawan" name="id_karyawan">
                            <option value="">--Pilih--</option>
                            @foreach ($karyawan as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_karyawan }}</option>
                            @endforeach
                        </select>
                        @error('id_karyawan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input required readonly type="text" class="form-control @error('jabatan') is-invalid @enderror"
                            id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
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
                            name="gaji_perbulan" value="{{ old('gaji_perbulan') }}">
                        @error('gaji_perbulan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bonus">Bonus</label>
                        <input required type="number" class="form-control  @error('bonus') is-invalid @enderror"
                            id="bonus" name="bonus" value="{{ old('bonus') }}">
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
                            name="total_gaji" value="{{ old('total_gaji') }}">
                        @error('total_gaji')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bulan_tahun">Bulan/Tahun</label>
                        <input required type="month" class="form-control  @error('bulan_tahun') is-invalid @enderror"
                            id="bulan_tahun" name="bulan_tahun" value="{{ old('bulan_tahun') }}">
                        @error('bulan_tahun')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> Simpan </button>
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
    $('#bonus').on('keyup',function() {
        let bonus = $(this).val();
        let gaji_bulan = $('#gaji_perbulan').val();
        let total_gaji = parseInt(bonus) + parseInt(gaji_bulan);
        $('#total_gaji').val(total_gaji);
    });
</script>
@endpush