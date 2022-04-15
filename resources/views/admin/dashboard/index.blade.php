@extends('template.admin')

@section('title')
Dashboard Admin
@endsection

@section('content')
<div class="page-header flex-wrap">
    <h3 class="mb-0"> Hi, welcome back!
    </h3>

</div>
<div class="row">
    <div class="col-md-4 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
        <div class="card bg-warning">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <p class="mb-0 color-card-head">Total Jabatan</p>
                        <h2 class="text-white"> {{ $total_jabatan }} <span class="h5"> Jabatan</span>
                        </h2>
                    </div>
                    <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
        <div class="card bg-danger">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <p class="mb-0 color-card-head">Total Karyawan</p>
                        <h2 class="text-white"> {{ $total_karyawan }} <span class="h5"> Karyawan</span>
                        </h2>
                    </div>
                    <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
        <div class="card bg-primary">
            <div class="card-body px-3 py-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div class="color-card">
                        <p class="mb-0 color-card-head">Data Gaji</p>
                        <h2 class="text-white"> {{ $total_gaji }} <span class="h5">Data</span>
                        </h2>
                    </div>
                    <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                </div>
            </div>
        </div>
    </div>


</div>



@endsection