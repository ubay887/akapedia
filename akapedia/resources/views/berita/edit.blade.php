@extends('layout.master_dashboard')

@section('tittle')
Berita
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="text-primary">Edit Berita</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Tittle</label>
                                    <input type="text" name="title" class="form-control" value="{{ $berita->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea name="content" class="form-control" id="content" cols="20"
                                        rows="10">{!! $berita->content !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" name="thumbnail" class="form-control">
                                </div>
                                <button class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="text-primary">Foto</h3>
                        </div>
                        <div class="panel-body">
                            <img src="{{ $berita->getAvatar() }}" width="180" height="180" alt="">
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
    });

</script>
@endsection

