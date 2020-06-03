@extends('layout.master_dashboard')

@section('tittle')
Promosi
@endsection

@section('main')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="text-primary">Data Promosi</h3>
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
                                        @foreach($promosi as $pr)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $pr->user->name }}</td>
                                            <td><a target="_blank"
                                                    href="{{ route('promosi.link', $pr->slug) }}">{{ $pr->title }}</a>
                                            </td>
                                            <td><a href="{{ route('promosi.edit', $pr->id) }}" class="btn btn-primary">Edit</a></td>
                                            <td><a href="#" PromosiID="{{ $pr->id }}"
                                                    class="btn btn-danger delete">Delete</a></td>
                                        </tr>
                                        @php
                                        $no++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $promosi->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="text-primary">Input Promosi</h3>
                        </div>
                        <div class="panel-body">
                            <form action="{{ route('promosi.create') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="">Tittle</label>
                                    <input type="text" name="title" class="form-control" placeholder="Tittle">
                                </div>
                                <div class="form-group">
                                    <label for="">Content</label>
                                    <textarea name="content" class="form-control" id="content" cols="20"
                                    rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" name="thumbnail" class="form-control" id="">
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
