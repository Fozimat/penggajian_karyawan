@extends('template.admin')

@section('title')
Data Karyawan
@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="{{ route('karyawan.create') }}" class="btn btn-success mb-3">Tambah Karyawan</a>
@if (session('flash'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
    {{ session('flash') }}
</div>
@endif
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Karyawan</h4>
                <div class="table-responsive">
                    <table class="table table-striped" id="myDataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>JK</th>
                                <th>Jabatan</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karyawan as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->nama_karyawan }}</td>
                                <td>{{ $k->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}</td>
                                <td>{{ $k->jabatan->nama_jabatan }}</td>
                                <td>{{ $k->telepon }}</td>
                                <td>{{ $k->alamat }}</td>
                                <td>
                                    <img src="{{ asset('foto/'.$k->foto) }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-primary">edit</a>
                                    <form class="d-inline" action="{{ route('karyawan.destroy', $k->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Apakah anda yakin ingin menghapus?');"
                                            type="submit" class="btn btn-warning">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('script')
<script src="{{ asset('assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready( function () {
        $('#myDataTable').DataTable({
                columnDefs: [ {
                targets: 5,
                render: function ( data, type, row ) {
                    return data.substr( 0, 20 ) + '…';
                }
            } ]
        });
    } );
</script>
@endpush