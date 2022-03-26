@extends('template.admin')

@section('title')
Data Jabatan
@endsection

@push('style')
<link rel="stylesheet" href="{{ asset('assets/vendors/datatables/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
<a href="{{ route('jabatan.create') }}" class="btn btn-success mb-3">Tambah Jabatan</a>
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
                <h4 class="card-title">Data Jabatan</h4>
                <div class="table-responsive">
                    <table class="table table-striped" id="myDataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jabatan</th>
                                <th>Gaji/bulan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jabatan as $j)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $j->nama_jabatan }}</td>
                                <td>@currency($j->gaji_perbulan)</td>
                                <td>
                                    <a href="{{ route('jabatan.edit', $j->id) }}" class="btn btn-primary">edit</a>
                                    <form action="{{ route('jabatan.destroy', $j->id) }}" class="d-inline"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus?');"
                                            class="btn btn-warning">delete</button>
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
        $('#myDataTable').DataTable();
    } );
</script>
@endpush