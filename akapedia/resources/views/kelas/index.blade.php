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
                            <h3 class="text-primary">Data Kelas</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>Wali Kelas</th>
                                            <th>Angkatan</th>
                                            <th colspan="3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach($kelas as $kls)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td><a href="{{ route('kelas.murid', $kls->id) }}">{{ $kls->kelas }}</a></td>
                                            <td>{{ $kls->guru->nama }}</td>
                                            <td>{{ $kls->created_at->format('Y') }}</td>
                                            <td><a href="{{ route('kelas.siswa', $kls->id) }}"><i class="fas fa-plus"></i> Siswa</a></td>
                                            <td><a href="{{ route('kelas.edit', $kls->id) }}"><i class="fas fa-edit"></i></a></td>
                                            <td><a href="#" class="delete" kelasID="{{ $kls->id }}"><i class="fas fa-trash"></i></a></td>
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
                            <h3 class="text-primary">Input Kelas</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('kelas.input') }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Guru</label>
                                    <select name="guru_id" id="" class="form-control">
                                        <option value="-">---</option>
                                        @foreach($pegawai as $guru)
                                        @if($guru->jabatan == 'guru')
                                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <input type="text" name="kelas" class="form-control" placeholder="Nama Kelas">
                                </div>
                                <button type="submit" class="btn btn-primary" >Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('.delete').click(function () {
            var kelas_id = $(this).attr('kelasID');
            swal({
                title: "Yakin?",
                text: "Akan Menghapus Data Kelas !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/data_kelas/" + kelas_id + "/delete";
                        swal("Data Berhasil Di Hapus", {
                            icon: "success",
                        });
                    }
                });
        })
    });
</script>
@endsection
