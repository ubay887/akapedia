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
                            <h3 class="text-primary">Input Jadwal</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('jadwal.create', $kelas->id) }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Mapel</label>
                                    <select name="mapel_id" class="form-control" id="">
                                        @foreach($mapel as $mpl)
                                        <option value="{{ $mpl->id }}">{{ $mpl->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Hari</label>
                                    <select name="hari" class="form-control" id="">
                                        <option value="-">---</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                    </select>
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
