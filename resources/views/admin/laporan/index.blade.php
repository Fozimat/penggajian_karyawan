@extends('template.admin')

@section('title')
Laporan
@endsection

@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body text-center">
                <h4 class="card-title">Cetak Semua Laporan Gaji Karyawan</h4>
                <a target="_blank" href="{{ route('print.semua') }}" class="btn btn-info btn-icon-text btn-block"> Print
                    <i class="mdi mdi-printer btn-icon-append"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Cetak Gaji Berdasarkan Karyawan</h4>
                <form action="{{ route('print.per.karyawan') }}" method="POST" target="_blank">
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
                    </div>
                    <button class="btn btn-info btn-icon-text"> Print
                        <i class="mdi mdi-printer btn-icon-append"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection