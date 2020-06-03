<style>
    table{
        border: 1px solid;
        width: 100%;
    }

    th, td{
        text-align: left;
        padding: 8px;
    }
</style>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Rata-Rata Nilai</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach($siswa as $sw)
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $sw->nama }}</td>
            <td>{{ $sw->jenis_kelamin }}</td>
            <td>{{ $sw->agama }}</td>
            <td>{{ $sw->alamat }}</td>
            <td>{{ $sw->no_tlp }}</td>
            <td>{{ $sw->rataNilai() }}</td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
    </tbody>
</table>
