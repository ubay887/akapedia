@extends('layout.master_dashboard')

@section('tittle')
Pegawai
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="m-0 font-weight-bold text-primary">Data Pegawai</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Alamat</th>
                                            <th>Jabatan</th>
                                            <th>Foto</th>
                                            @if(auth()->user()->role == 'kepala sekolah')
                                            <th colspan="2">Aksi</th>
                                            @elseif(auth()->user()->role == 'tu')
                                            <th colspan="2">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach($pegawai as $pgw)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $pgw->nama }}</td>
                                            <td>{{ $pgw->jenis_kelamin }}</td>
                                            <td>{{ $pgw->agama }}</td>
                                            <td>{{ $pgw->alamat }}</td>
                                            <td>{{ $pgw->jabatan }}</td>
                                            <td><img src="{{ $pgw->getAvatar() }}" width="50" height="50" alt=""></td>
                                            @if(auth()->user()->role == 'kepala sekolah')
                                            <td><a href="/data_pegawai/{{ $pgw->id }}/edit"><i
                                                        class="lnr lnr-pencil"></i></a></td>
                                            <td><a href="#" class="delete" pegawaiId="{{ $pgw->id }}"><i
                                                        class="lnr lnr-trash"></i></a></td>
                                            @elseif(auth()->user()->role == 'tu')
                                            <td><a href="/data_pegawai/{{ $pgw->id }}/edit"><i
                                                        class="lnr lnr-pencil"></i></a></td>
                                            <td><a href="#" class="delete" pegawaiId="{{ $pgw->id }}"><i
                                                        class="lnr lnr-trash"></i></a></td>
                                            @endif
                                        </tr>
                                        @php
                                        $no++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $pegawai->links() }}
                            </div>
                        </div>
                    </div>
                    @if(auth()->user()->role == 'kepala sekolah')
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-tittle">
                                <h3 class="m-0 font-weight-bold text-primary">Tambah Pegawai</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('create_pegawai')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"
                                        value="{{ old('nama') }}">
                                    @if($errors->has('nama'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        value="{{ old('password') }}">
                                    @if($errors->has('password'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="">
                                        <option value="-">---</option>
                                        <option value="Laki-laki"
                                            {{ (old('jenis_kelamin') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ (old('jenis_kelamin') == 'Perempuan') ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>
                                    @if($errors->has('jenis_kelamin'))
                                    <span class="help-block"
                                        style="color: red;">{{ $errors->first('jenis_kelamin') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('agama') ? 'has-error' : '' }}">
                                    <label for="">Agama</label>
                                    <select name="agama" class="form-control">
                                        <option value="-">---</option>
                                        <option value="Islam" {{ (old('Islam') == 'Islam') ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="Kristen" {{ (old('Kristen') == 'Kristen') ? 'selected' : '' }}>
                                            Kristen</option>
                                        <option value="Katolik" {{ (old('Katolik') == 'Katolik') ? 'selected' : '' }}>
                                            Katolik</option>
                                        <option value="Budha" {{ (old('Budha') == 'Budha') ? 'selected' : '' }}>Budha
                                        </option>
                                    </select>
                                    @if($errors->has('agama'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('agama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" class="form-control" cols="30" rows="10"
                                        placeholder="">{{ old('alamat') }}</textarea>
                                    @if($errors->has('alamat'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('jabatan') ? 'has-error' : '' }}">
                                    <label for="">Jabatan</label>
                                    <select name="jabatan" class="form-control">
                                        <option value="-">---</option>
                                        <option value="kepala sekolah"
                                            {{ (old('kepala sekolah"') == 'kepala sekolah"') ? 'selected' : '' }}>Kepala
                                            Sekolah</option>
                                        <option value="guru" {{ (old('guru') == 'guru') ? 'selected' : '' }}>Guru
                                        </option>
                                        <option value="tU" {{ (old('tU') == 'tu') ? 'selected' : '' }}>TU</option>
                                        <option value="bK" {{ (old('bK') == 'bk') ? 'selected' : '' }}>BK</option>
                                        <option value="ekstra" {{ (old('ekstra') == 'ekstra') ? 'selected' : '' }}>
                                            Ekstra</option>
                                    </select>
                                    @if($errors->has('agama'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('agama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('no_tlp') ? 'has-error' : '' }}">
                                    <label for="">No Tlp</label>
                                    <input type="text" name="no_tlp" class="form-control" value="{{ old('no_tlp') }}"
                                        placeholder="No Tlp">
                                    @if($errors->has('no_tlp'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('no_tlp') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                                    <label for="">Foto</label>
                                    <input type="file" name="avatar" class="form-control" id="">
                                    @if($errors->has('avatar'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('avatar') }}</span>
                                    @endif
                                </div>
                                <div class="footer">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @elseif(auth()->user()->role == 'tu')
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-tittle">
                                <h3 class="m-0 font-weight-bold text-primary">Tambah Pegawai</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('create_pegawai')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"
                                        value="{{ old('nama') }}">
                                    @if($errors->has('nama'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('nama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        value="{{ old('email') }}">
                                    @if($errors->has('email'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        value="{{ old('password') }}">
                                    @if($errors->has('password'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="">
                                        <option value="-">---</option>
                                        <option value="Laki-laki"
                                            {{ (old('jenis_kelamin') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ (old('jenis_kelamin') == 'Perempuan') ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>
                                    @if($errors->has('jenis_kelamin'))
                                    <span class="help-block"
                                        style="color: red;">{{ $errors->first('jenis_kelamin') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('agama') ? 'has-error' : '' }}">
                                    <label for="">Agama</label>
                                    <select name="agama" class="form-control">
                                        <option value="-">---</option>
                                        <option value="Islam" {{ (old('Islam') == 'Islam') ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="Kristen" {{ (old('Kristen') == 'Kristen') ? 'selected' : '' }}>
                                            Kristen</option>
                                        <option value="Katolik" {{ (old('Katolik') == 'Katolik') ? 'selected' : '' }}>
                                            Katolik</option>
                                        <option value="Budha" {{ (old('Budha') == 'Budha') ? 'selected' : '' }}>Budha
                                        </option>
                                    </select>
                                    @if($errors->has('agama'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('agama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" class="form-control" cols="30" rows="10"
                                        placeholder="">{{ old('alamat') }}</textarea>
                                    @if($errors->has('alamat'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('alamat') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('jabatan') ? 'has-error' : '' }}">
                                    <label for="">Jabatan</label>
                                    <select name="jabatan" class="form-control">
                                        <option value="-">---</option>
                                        <option value="kepala sekolah"
                                            {{ (old('kepala sekolah"') == 'kepala sekolah"') ? 'selected' : '' }}>Kepala
                                            Sekolah</option>
                                        <option value="guru" {{ (old('guru') == 'guru') ? 'selected' : '' }}>Guru
                                        </option>
                                        <option value="tU" {{ (old('tU') == 'tu') ? 'selected' : '' }}>TU</option>
                                        <option value="bK" {{ (old('bK') == 'bk') ? 'selected' : '' }}>BK</option>
                                        <option value="ekstra" {{ (old('ekstra') == 'ekstra') ? 'selected' : '' }}>
                                            Ekstra</option>
                                    </select>
                                    @if($errors->has('agama'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('agama') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('no_tlp') ? 'has-error' : '' }}">
                                    <label for="">No Tlp</label>
                                    <input type="text" name="no_tlp" class="form-control" value="{{ old('no_tlp') }}"
                                        placeholder="No Tlp">
                                    @if($errors->has('no_tlp'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('no_tlp') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                                    <label for="">Foto</label>
                                    <input type="file" name="avatar" class="form-control" id="">
                                    @if($errors->has('avatar'))
                                    <span class="help-block" style="color: red;">{{ $errors->first('avatar') }}</span>
                                    @endif
                                </div>
                                <div class="footer">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
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
            var pegawai_id = $(this).attr('pegawaiId');
            swal({
                title: "Yakin?",
                text: "Akan Menghapus Data Pegawai !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/data_pegawai/" + pegawai_id + "/delete";
                        swal("Data Berhasil Di Hapus", {
                            icon: "success",
                        });
                    }
                });
        });
    });
</script>
@endsection
