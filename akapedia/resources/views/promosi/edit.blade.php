@extends('layout.master_dashboard')

@section('tittle')
Promosi
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h1 class="text-primary">Edit Promosi</h1>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('promosi.update', $promosi->id) }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Tittle</label>
                                    <input type="text" name="title" class="form-control" value="{{ $promosi->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea name="content" class="form-control" id="content" cols="20"
                                    rows="10">{!! $promosi->content !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" name="thumbnail" class="form-control">
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="text-primary">Foto</h3>
                        </div>
                        <div class="panel-body">
                            <img src="{{ $promosi->getAvatar() }}" width="190" height="190" alt="{{ $promosi->thumbnail }}">
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
            var promosi_id = $(this).attr('PromosiID');
            swal({
                title: "Yakin?",
                text: "Akan Menghapus Promosi Ini !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/data_promosi/" + promosi_id + "/delete";
                        swal("Data Berhasil Di Hapus", {
                            icon: "success",
                        });
                    }
                });
        })
    });

</script>
@endsection