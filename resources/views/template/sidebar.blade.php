<li class="nav-item {{ request()->is('admin') ? 'active': '' }}">
    <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
    </a>
</li>

<li class="nav-item {{ request()->is('admin/jabatan*') ? 'active': '' }}">
    <a class="nav-link" href="{{ route('jabatan.index') }}">
        <i class="mdi mdi-shuffle-disabled menu-icon"></i>
        <span class="menu-title">Data Jabatan</span>
    </a>
</li>

<li class="nav-item {{ request()->is('admin/karyawan*') ? 'active': '' }}">
    <a class="nav-link" href="{{ route('karyawan.index') }}">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">Data Karyawan</span>
    </a>
</li>

<li class="nav-item {{ request()->is('admin/gaji*') ? 'active': '' }}">
    <a class="nav-link" href="{{ route('gaji.index') }}">
        <i class="mdi mdi-cash-usd menu-icon"></i>
        <span class="menu-title">Data Gaji</span>
    </a>
</li>
<li class="nav-item {{ request()->is('admin/laporan') ? 'active': '' }}">
    <a class="nav-link" href="{{ route('laporan') }}">
        <i class="mdi mdi mdi-printer menu-icon"></i>
        <span class="menu-title">Laporan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
        <i class="mdi mdi-logout menu-icon"></i>
        <span class="menu-title">Logout</span>
    </a>
</li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>