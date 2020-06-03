@extends('layout.master_dashboard')

@section('tittle')
Pegawai
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="m-0 font-weight-bold text-primary">Edit Data Pegawai</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/data_pegawai/{{ $pegawai->id }}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="{{ $pegawai->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $pegawai->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control" placeholder="Password" value="{{ $pegawai->password }}">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="-" @if($pegawai->jenis_kelamin == '-') selected @endif >---</option>
                                    <option value="Laki-laki" @if($pegawai->jenis_kelamin == 'Laki-laki') selected @endif >Laki-laki</option>
                                    <option value="Perempuan" @if($pegawai->jenis_kelamin == 'Perempuan') selected @endif >Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="agama" class="form-control">
                                    <option value="-" @if($pegawai->agama == '-') selected @endif >---</option>
                                    <option value="Islam" @if($pegawai->agama == 'Islam') selected @endif >Islam</option>
                                    <option value="Kristen" @if($pegawai->agama == 'Kristen') selected @endif >Kristen</option>
                                    <option value="Katolik" @if($pegawai->agama == 'Katolik') selected @endif >Katolik</option>
                                    <option value="Budha" @if($pegawai->agama == 'Budha') selected @endif >Budha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{ $pegawai->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <select name="jabatan" class="form-control">
                                    <option value="-" @if($pegawai->jabatan == '-') selected @endif >---</option>
                                    <option value="kepala sekolah" @if($pegawai->jabatan == 'kepala sekolah') selected @endif >Kepala Sekolah</option>
                                    <option value="guru" @if($pegawai->jabatan == 'guru') selected @endif >Guru</option>
                                    <option value="tu" @if($pegawai->jabatan == 'tu') selected @endif >TU</option>
                                    <option value="bk" @if($pegawai->jabatan == 'bk') selected @endif >BK</option>
                                    <option value="ekstra" @if($pegawai->jabatan == 'ekstra') selected @endif >Ekstra</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">No Telp</label>
                                <input type="text" name="no_tlp" class="form-control" class="form-control" value="{{ $pegawai->no_tlp }}">
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                            <div class="footer">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="panel">
                        <div class="panel-body">
                            <img src="{{ $pegawai->getAvatar() }}" width="100" height="100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
