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
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No Telp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach($kelas->siswa as $sw)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $sw->nama }}</td>
                                            <td>{{ $sw->no_tlp }}</td>
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
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>Tambah Siswa</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('kelas.tambah_siswa', $kelas->id) }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Siswa</label>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Pilih</th>
                                                    <th>Nama Siswa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($siswa as $sw)
                                                <tr>
                                                    <td><input class="form-check-input" type="checkbox" name="siswa_id[]" value="{{ $sw->id }}"></td>
                                                    <td>{{ $sw->nama }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $siswa->links() }}
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
