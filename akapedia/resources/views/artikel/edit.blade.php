@extends('layout.master_dashboard')

@section('tittle')
Artikel
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="m-0 font-weight-bold text-primary">Edit Pengumuman</h4>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('artikel.update', $artikel->id) }}" enctype="multipart/form-data" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Tittle</label>
                                    <input type="text" name="tittle" class="form-control" placeholder="Tittle" value="{{ $artikel->tittle }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea name="content" class="form-control" id="content" cols="20"
                                        rows="10">{!! $artikel->content !!}</textarea>
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
                <div class="col-md-3">
                    <div class="panel">
                        <div class="panel-body">
                            <img src="{{ $artikel->getAvatar() }}" width="200" height="200" alt="">
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
