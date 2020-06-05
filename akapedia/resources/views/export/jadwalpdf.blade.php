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
<h3>{{ $kelas->kelas }}</h3><br>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Hari</th>
            <th>Mapel</th>
            <th>Guru</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach($kelas->mapel as $mapel)
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $mapel->pivot->hari }}</td>
            <td>{{ $mapel->nama }}</td>
            <td>{{ $mapel->guru->nama }}</td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
    </tbody>
</table>
