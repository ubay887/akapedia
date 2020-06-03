<div id="wrapper">
    <!-- NAVBAR -->
    @include('layout.dashboard.navbar')
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a href="{{ route('dashboard') }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="fas fa-school"></i>
                            <span>Data Sekolah</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages" class="collapse ">
                            <ul class="nav">
                                @if(auth()->user()->role == 'kepala sekolah')
                                <li><a href="{{ route('siswa') }}" class="">Siswa</a></li>
                                <li><a href="{{ route('pegawai') }}" class="">Pegawai</a></li>
                                @elseif(auth()->user()->role == 'guru')
                                <li><a href="{{ route('siswa') }}" class="">Siswa</a></li>
                                <li><a href="{{ route('pegawai') }}" class="">Pegawai</a></li>
                                @elseif(auth()->user()->role == 'tu')
                                <li><a href="{{ route('siswa') }}" class="">Siswa</a></li>
                                <li><a href="{{ route('pegawai') }}" class="">Pegawai</a></li>
                                @endif
                            </ul>
                        </div>
                    </li>
                    @if(auth()->user()->role == 'kepala sekolah')
                    <li><a href="{{ route('mapel') }}"><i class="lnr lnr-book"></i>Mapel</a></li>
                    <li>
                        <a href="#pengumuman" data-toggle="collapse" class="collapsed"><i class="fas fa-book"></i>
                            <span>Pengumuman</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="pengumuman" class="collapse ">
                            <ul class="nav">
                                <li><a href="{{ route('pengumuman') }}" class="">Pengumuman</a></li>
                                <li><a href="{{ route('berita') }}" class="">Berita</a></li>
                                <li><a href="{{ route('promosi') }}" class="">Promosi</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{ route('kelas') }}"><i class="fas fa-school"></i> Kelas</a></li>
                    <li><a href="{{ route('jadwal') }}"><i class="fas fa-calendar"></i> Jadwal</a></li>
                    @elseif(auth()->user()->role == 'guru')
                    <li><a href="{{ route('mapel') }}"><i class="lnr lnr-book"></i>Mapel</a></li>
                    <li><a href="{{ route('kelas') }}"><i class="fas fa-school"></i> Kelas</a></li>
                    <li><a href="{{ route('jadwal') }}"><i class="fas fa-calendar"></i> Jadwal</a></li>
                    @elseif(auth()->user()->role == 'tu')
                    <li><a href="{{ route('mapel') }}"><i class="lnr lnr-book"></i>Mapel</a></li>
                    <li>
                        <a href="#pengumuman" data-toggle="collapse" class="collapsed"><i class="fas fa-book"></i>
                            <span>Pengumuman</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="pengumuman" class="collapse ">
                            <ul class="nav">
                                <li><a href="{{ route('pengumuman') }}" class="">Pengumuman</a></li>
                                <li><a href="{{ route('berita') }}" class="">Berita</a></li>
                                <li><a href="{{ route('promosi') }}" class="">Promosi</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{ route('kelas') }}"><i class="fas fa-school"></i> Kelas</a></li>
                    <li><a href="{{ route('jadwal') }}"><i class="fas fa-calendar"></i> Jadwal</a></li>
                    @endif
                    <li><a href="{{ route('about') }}"><i class="fas fa-user"></i> About</a></li>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->
