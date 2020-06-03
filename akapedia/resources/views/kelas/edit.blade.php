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
                            <h3>Edit Kelas</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('kelas.update', $kelas->id) }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Guru</label>
                                    <select name="guru_id" class="form-control">
                                        @foreach($pegawai as $guru)
                                        @if($guru->jabatan == 'guru')
                                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Kelas</label>
                                    <input type="text" name="kelas" class="form-control" value="{{ $kelas->kelas }}" id="">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
