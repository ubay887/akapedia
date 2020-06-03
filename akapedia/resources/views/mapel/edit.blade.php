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
                            <h3 class="m-0 font-weight-bold text-primary">Edit Mapel</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/data_mapel/{{ $mapel->id }}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Kode MataPelajaran</label>
                                    <input type="text" name="kode" class="form-control" value="{{ $mapel->kode }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama MataPelajaran</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $mapel->nama }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Guru</label>
                                    <select name="guru_id" class="form-control">
                                        <option value="" @if($mapel->guru_id == '$mapel->guru_id') selected @endif >{{ $mapel->guru->nama }}</option>
                                        @foreach($guru as $gr)
                                        @if($gr->jabatan == 'guru')
                                        <option value="{{ $gr->id }}">{{ $gr->nama }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="footer">
                                    <button class="btn btn-primary">Simpan</button>
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
