@extends('layout.master_dashboard')

@section('tittle')
Artikel
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="m-0 font-weight-bold text-primary">Artikel</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Artikel</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach($artikel as $atl)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $atl->user->name }}</td>
                                            <td><a target="_blank"
                                                    href="{{ route('site.artikel', $atl->slug) }}">{{ $atl->tittle }}</a>
                                            </td>
                                            <td><a href="{{ route('artikel.edit', $atl->id )}}" class="btn btn-primary">Edit</a></td>
                                            <td><a href="#" artikelID="{{ $atl->id }}" class="btn btn-danger delete">Delete</a></td>
                                        </tr>
                                        @php
                                        $no++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $artikel->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="m-0 font-weight-bold text-primary">Tambah Pengumuman</h4>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('laporan') }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Tittle</label>
                                    <input type="text" name="tittle" class="form-control" placeholder="Tittle">
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea name="content" class="form-control" id="content" cols="20"
                                        rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input class="form-control" type="file" name="thumbnail" data-preview="holder">
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                                <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
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

@section('js')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))

        .catch(error => {
            console.error(error);
        });

    $(document).ready(function(){
        $('#lfm').filemanager('image');

        $('.delete').click(function () {
            var artikel_id = $(this).attr('artikelID');
            swal({
                title: "Yakin?",
                text: "Akan Menghapus Pengumuman !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/data_pengumuman/" + artikel_id + "/delete";
                        swal("Data Berhasil Di Hapus", {
                            icon: "success",
                        });
                    }
                });
        })
    });

</script>
@endsection
