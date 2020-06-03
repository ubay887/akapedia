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
                            <h3 class="text-primary">Jadwal</h3>
                        </div>
                        <div class="panel-heading">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Wali Kelas</th>
                                            <th>Angkatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach($kelas as $kls)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td><a href="{{ route('jadwal.kelas', $kls->id) }}">{{ $kls->kelas }}</a></td>
                                            <td>{{ $kls->guru->nama }}</td>
                                            <td>{{ $kls->created_at->format('Y') }}</td>
                                            <td><a href="{{ route('jadwal.create_jadwal', $kls->id) }}"><i class="fas fa-plus"></i> Jadwal</a></td>
                                        </tr>
                                        @php
                                        $no++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $kelas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
