@extends('layout.master_dashboard')

@section('tittle')
Profile
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="panel">
                        <div class="panel-body">
                            <form action="{{ route('profile.update', auth()->user()->pegawai->id) }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ auth()->user()->pegawai->nama }}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->pegawai->email }}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control" value="{{ auth()->user()->pegawai->password }}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="-" @if(auth()->user()->pegawai->jenis_kelamin == '-') selected
                                            @endif >---</option>
                                        <option value="Laki-laki" @if(auth()->user()->pegawai->jenis_kelamin ==
                                            'Laki-laki') selected @endif >Laki-laki</option>
                                        <option value="Perempuan" @if(auth()->user()->pegawai->jenis_kelamin ==
                                            'Perempuan') selected @endif >Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Agama</label>
                                    <select name="agama" class="form-control">
                                        <option value="-" @if(auth()->user()->pegawai->agama == '-') selected @endif >---
                                        </option>
                                        <option value="Islam" @if(auth()->user()->pegawai->agama == 'Islam') selected
                                            @endif >Islam</option>
                                        <option value="Kristen" @if(auth()->user()->pegawai->agama == 'Kristen') selected
                                            @endif >Kristen</option>
                                        <option value="Katolik" @if(auth()->user()->pegawai->agama == 'Katolik') selected
                                            @endif >Katolik</option>
                                        <option value="Budha" @if(auth()->user()->pegawai->agama == 'Budha') selected
                                            @endif >Budha</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{ auth()->user()->pegawai->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">No Telp</label>
                                    <input type="text" name="no_tlp" class="form-control" value="{{ auth()->user()->pegawai->no_tlp }}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <select name="jabatan" class="form-control" disabled>
                                        <option value="-" @if(auth()->user()->pegawai->jabatan == '-') selected @endif >---</option>
                                        <option value="kepala sekolah" @if(auth()->user()->pegawai->jabatan == 'kepala sekolah') selected @endif >Kepala Sekolah</option>
                                        <option value="guru" @if(auth()->user()->pegawai->jabatan == 'guru') selected @endif >Guru</option>
                                        <option value="tu" @if(auth()->user()->pegawai->jabatan == 'tu') selected @endif >TU</option>
                                        <option value="bk" @if(auth()->user()->pegawai->jabatan == 'bk') selected @endif >BK</option>
                                        <option value="ekstra" @if(auth()->user()->pegawai->jabatan == 'ekstra') selected @endif >Ekstra</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" name="avatar" class="form-control" id="">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-body">
                            <img src="{{ auth()->user()->pegawai->getAvatar() }}" width="180" height="180" alt="{{ auth()->user()->pegawai->avatar }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
