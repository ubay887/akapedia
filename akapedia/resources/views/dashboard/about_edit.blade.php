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
                            <h3>Edit About</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('about.update', $about->id) }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Kode</label>
                                    <input type="text" name="kode" class="form-control" value="{{ $about->kode }}" id="" hidden>
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea name="content" class="form-control" id="content" cols="20"
                                        rows="10">{!! $about->content !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">No Telp</label>
                                    <input type="text" name="no_tlp" class="form-control" value="{{ $about->no_tlp }}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Instagram</label>
                                    <input type="text" name="instagram" class="form-control" value="{{ $about->instagram }}" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input type="text" name="facebook" class="form-control" value="{{ $about->facebook }}" id="">
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
