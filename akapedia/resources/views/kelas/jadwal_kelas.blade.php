@extends('layout.master_dashboard')

@section('tittle')
Jadwal
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="text-primary">{{ $kelas->kelas }}</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Hari</th>
                                            <th>Mapel</th>
                                            <th>Guru</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kelas->mapel as $mapel)
                                        <tr>
                                            <td>{{ $mapel->pivot->hari }}</td>
                                            <td>{{ $mapel->nama }}</td>
                                            <td>{{ $mapel->guru->nama }}</td>
                                            <td><a href="/data_jadwal/{{ $kelas->id }}/{{ $mapel->id }}/delete"><i class="fas fa-trash"></i></a></td>
                                        </tr>
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
