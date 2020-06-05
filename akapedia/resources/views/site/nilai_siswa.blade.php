@extends('layout.master_site')

@section('tittle')
Nilai
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-large">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="panel mt-4">
                        <div class="panel-heading">
                            <h3>{{ $siswa->nama }}</h3>
                            <div class="right">
                                <a href="{{ route('print.siswa', $siswa->id) }}" class="btn btn-primary">Print</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>Mapel</th>
                                            <th>Guru</th>
                                            <th>Semester</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($siswa->mapel as $mapel)
                                            <tr>
                                                <td>{{ $mapel->kode }}</td>
                                                <td>{{ $mapel->nama }}</td>
                                                <td>{{ $mapel->guru->nama }}</td>
                                                <td>{{ $mapel->pivot->semester }}</td>
                                                <td>{{ $mapel->pivot->nilai }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
@foreach($about as $ab)
<h5 style="color: white;"><i class="fab fa-instagram" style="color: white;"></i><span> {{ $ab->instagram }}</span></h5>
<h5 style="color: white;"><i class="fab fa-facebook"></i><span> {{ $ab->facebook }}</span></h5>
<h5 style="color: white;"><i class="fab fa-whatsapp"></i><span> {{ $ab->no_tlp }}</span></h5>
@endforeach
@endsection
