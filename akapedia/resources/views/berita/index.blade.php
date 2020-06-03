@extends('layout.master_dashboard')

@section('tittle')
Berita
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="m-0">Berita</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tittle</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach($berita as $brt)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $brt->user->name }}</td>
                                        <td><a target="_blank"
                                                href="{{ route('berita.link', $brt->slug) }}">{{ $brt->title }}</a></td>
                                        <td><a href="{{ route('berita.edit', $brt->id) }}" class="btn btn-primary" class="btn btn-primary">Edit</a></td>
                                        <td><a href="#" BeritaID="{{ $brt->id }}" class="btn btn-danger delete">Delete</a></td>
                                    </tr>
                                    @php
                                    $no++;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $berita->links() }}
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="m-0">Input Berita</h3>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('berita.create') }}" enctype="multipart/form-data" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Tittle</label>
                                <input type="text" name="title" class="form-control" placeholder="Tittle" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea name="content" class="form-control" id="content" cols="20"
                                    rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Foto</label>
                                <input type="file" name="thumbnail" class="form-control">
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
@endsection

@section('js')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))

        .catch(error => {
            console.error(error);
        });

    $(document).ready(function () {
        $('#lfm').filemanager('image');

        $('.delete').click(function () {
            var berita_id = $(this).attr('BeritaID');
            swal({
                title: "Yakin?",
                text: "Akan Menghapus Berita Ini !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/data_berita/" + berita_id + "/delete";
                        swal("Data Berhasil Di Hapus", {
                            icon: "success",
                        });
                    }
                });
        })
    });

</script>
@endsection
