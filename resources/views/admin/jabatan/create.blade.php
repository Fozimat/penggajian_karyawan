@extends('template.admin')

@section('title')
Tambah Data Jabatan
@endsection

@section('content')
<div class="row">

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Jabatan</h4>
                <form class="forms-sample" action="{{ route('jabatan.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_jabatan">Nama Jabatan</label>
                        <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror"
                            id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan') }}">
                        @error('nama_jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gaji_perbulan">Gaji/bulan</label>
                        <input type="number" class="form-control  @error('gaji_perbulan') is-invalid @enderror"
                            id="gaji_perbulan" name="gaji_perbulan" value="{{ old('gaji_perbulan') }}">
                        @error('gaji_perbulan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mr-2"> Simpan </button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('script')
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
@endpush