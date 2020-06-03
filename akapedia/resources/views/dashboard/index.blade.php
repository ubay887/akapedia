@extends('layout.master_dashboard')

@section('tittle')
Dashboard
@endsection

@section('main')
<!-- MAIN -->
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-user"></i></span>
                                <p>
                                    <span class="number">{{ total_siswa() }}</span>
                                    <span class="tittle">Total Siswa</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="metric">
                                <span class="icon"><i class="lnr lnr-user"></i></span>
                                <p>
                                    <span class="number">{{ total_pegawai() }}</span>
                                    <span class="tittle">Pegawai</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="metric">
                                <span class="icon"><i class="fas fa-book"></i></span>
                                <p>
                                    <span class="number">{{ total_berita() }}</span>
                                    <span class="tittle">Berita</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="metric">
                                <span class="icon"><i class="fas fa-book"></i></span>
                                <p>
                                    <span class="number">{{ total_promosi() }}</span>
                                    <span class="tittle">Promosi/Event</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="metric">
                                <span class="icon"><i class="fas fa-book"></i></span>
                                <p>
                                    <span class="number">{{ total_pengumuman() }}</span>
                                    <span class="tittle">Pengumuman</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN -->
@endsection
