@extends('layout.master_dashboard')

@section('tittle')
About
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="text-primary">About</h3>
                        </div>
                        <div class="panel-body">
                            <div class="table-renposive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th>No Telp</th>
                                            <th>Instagram</th>
                                            <th>Facebook</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($abouts as $about)
                                        <tr>
                                            <td>{{ $about->kode }}</td>
                                            <td>{{ $about->no_tlp }}</td>
                                            <td>{{ $about->instagram }}</td>
                                            <td>{{ $about->facebook }}</td>
                                            <td><a href="{{ route('about.edit', $about->id) }}"><i class="fas fa-edit"></i></a></td>
                                            <td><a href="#" class="delete" aboutID="{{ $about->id }}"><i class="fas fa-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $abouts->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>Input About</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('about.input') }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Kode</label>
                                    <input type="text" name="kode" class="form-control" placeholder="Kode">
                                </div>
                                <div class="form-group">
                                    <label for="">conetn</label>
                                    <textarea name="content" class="form-control" id="content" cols="20"
                                        rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">No Telp</label>
                                    <input type="text" name="no_tlp" class="form-control" placeholder="No telp" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Instagram</label>
                                    <input type="text" name="instagram" class="form-control" placeholder="Instagram" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input type="text" name="facebook" class="form-control" placeholder="facebook">
                                </div>
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

    $(document).ready(function () {
        $('#lfm').filemanager('image');

        $('.delete').click(function () {
            var about_id = $(this).attr('aboutID');
            swal({
                title: "Yakin?",
                text: "Akan Menghapus Berita Ini !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/data_about/" + about_id + "/delete";
                        swal("Data Berhasil Di Hapus", {
                            icon: "success",
                        });
                    }
                });
        })
    });

</script>
@endsection
