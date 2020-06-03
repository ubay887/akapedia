@extends('layout.master_dashboard')

@section('tittle')
Mapel
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="m-0 font-weight-bold text-primary">Data Mapel</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode MataPelajaran</th>
                                            <th>Nama MataPelajaran</th>
                                            <th>Guru</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach($mapel as $mpl)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $mpl->kode }}</td>
                                            <td>{{ $mpl->nama }}</td>
                                            <td>{{ $mpl->guru->nama }}</td>
                                            <td><a href="/data_mapel/{{ $mpl->id }}/edit"><i class="lnr lnr-pencil"></i></a></td>
                                            <td><a href="#" class="delete" mapelId="{{ $mpl->id }}"><i class="lnr lnr-trash"></i></a></td>

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
                            <h3 class="m-0 font-weight-bold text-primary">Input Data Mapel</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('create_mapel') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('kode') ? 'has-error' : '' }}">
                                <label for="">Kode MataPelajaran</label>
                                <input type="text" name="kode" class="form-control" placeholder="Kode MataPelajaran" value="{{ old('kode') }}">
                                @if($errors->has('kode'))
                                <span class="help-block" style="color: red;">{{ $errors->first('kode') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                                <label for="">Nama MataPelajaran</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama MataPelajaran" value="{{ old('nama') }}">
                                @if($errors->has('nama'))
                                <span class="help-block" style="color: red;">{{ $errors->first('nama') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('guru_id') ? 'has-error' : '' }}">
                                <label for="">Guru</label>
                                <select name="guru_id" class="form-control">
                                    @foreach($guru as $gr)
                                    @if($gr->jabatan == 'guru')
                                    <option value="{{ $gr->id }}">{{ $gr->nama }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('guru_id'))
                                <span class="help-block" style="color: red;">{{ $errors->first('guru_id') }}</span>
                                @endif
                            </div>
                            <div class="footer">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
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
    $(document).ready(function() {
        $('.delete').click(function() {
            var mapel_id = $(this).attr('mapelId');
            swal({
                title: "Yakin?",
                text: "Akan Menghapus Data Mapel !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/data_mapel/" + mapel_id +  "/delete";
                    swal("Data Berhasil Di Hapus", {
                    icon: "success",
                    });
                }
            });
        });
    });
</script>
@endsection
