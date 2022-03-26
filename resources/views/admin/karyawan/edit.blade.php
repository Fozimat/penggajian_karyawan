@extends('template.admin')

@section('title')
Edit Data Karyawan
@endsection

@section('content')
<div class="row">

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Karyawan</h4>
                <form class="forms-sample" action="{{ route('karyawan.update', $karyawan->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nama_karyawan">Nama Karyawan</label>
                        <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror"
                            id="nama_karyawan" name="nama_karyawan" value="{{ $karyawan->nama_karyawan }}">
                        @error('nama_karyawan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_jabatan">Jabatan</label>
                        <select class="form-control  @error('id_jabatan') is-invalid @enderror" id="id_jabatan"
                            name="id_jabatan">
                            <option value="">--Pilih--</option>
                            @foreach ($jabatan as $j)
                            <option value="{{ $j->id }}" {{ $j->id == $karyawan->jabatan->id ? 'selected' : ''
                                }}>{{ $j->nama_jabatan }}</option>
                            @endforeach
                        </select>
                        @error('id_jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon
                        </label>
                        <input type="text" class="form-control  @error('telepon') is-invalid @enderror" id="telepon"
                            name="telepon" value="{{ $karyawan->telepon }}">
                        @error('telepon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control  @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
                            name="jenis_kelamin">
                            <option value="">--Pilih--</option>
                            <option value="Laki-laki" {{ ($karyawan->jenis_kelamin == 'Laki-laki' ? 'selected': '')
                                }}>Laki-laki</option>
                            <option value="Perempuan" {{ ($karyawan->jenis_kelamin == 'Perempuan' ? 'selected': '')
                                }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="file-upload-default">
                        <input type="hidden" name="old_foto" value="{{ $karyawan->foto }}">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control @error('foto') is-invalid @enderror file-upload-info"
                                disabled="">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button"> Upload </button>
                            </span>
                            @error('foto')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div style="font-size: 12px;" class="text-danger mt-1">Kosongkan jika tidak ingin
                            mengganti
                            foto</div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                            rows="4">{{ $karyawan->alamat }}</textarea>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2"> Ubah </button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@push('script')
<script src="{{ asset('assets/js/file-upload.js') }}"></script>
@endpush