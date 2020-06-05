@extends('layout.master_dashboard')

@section('tittle')
Kelas
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>{{ $kelas->kelas }}</h3>
                            <div class="right">
                                <a href="{{ route('print.siswa', $kelas->id) }}" class="btn btn-primary">Print</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach($kelas->siswa as $siswa)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $siswa->nama }}</td>
                                            <td>{{ $siswa->alamat }}</td>
                                            <td>{{ $siswa->no_tlp }}</td>
                                            <td><a href="/data_kelas/{{ $kelas->id }}/{{ $siswa->id }}/delete"><i class="fas fa-trash"></i></a></td>
                                        </tr>
                                        @php
                                        $no++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
