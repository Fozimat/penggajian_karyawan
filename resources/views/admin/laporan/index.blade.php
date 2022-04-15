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
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="id_karyawan">Nama Karyawan</label>
                                <select required class="form-control" id="id_karyawan" name="id_karyawan">
                                    <option value="">--Pilih--</option>
                                    @foreach ($karyawan as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_karyawan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select required class="form-control" id="tahun" name="tahun">
                                    <option value="">--Pilih--</option>
                                    @foreach ($tahun as $t)
                                    <option value="{{ $t->tahun }}">{{ $t->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-info btn-icon-text"> Print
                        <i class="mdi mdi-printer btn-icon-append"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Cetak Gaji Berdasarkan Jabatan</h4>
                <form action="{{ route('print.per.jabatan') }}" method="POST" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="id_jabatan">Jabatan</label>
                                <select required class="form-control" id="id_jabatan" name="id_jabatan">
                                    <option value="">--Pilih--</option>
                                    @foreach ($jabatan as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tahun">Bulan/Tahun</label>
                                <input required type="month" class="form-control" id="bulan_tahun" name="bulan_tahun">
                            </div>
                        </div>
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