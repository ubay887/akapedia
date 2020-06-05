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
            <th>Kode</th>
            <th>Mapel</th>
            <th>Guru</th>
            <th>Semester</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach($siswa->mapel as $mapel)
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $mapel->kode }}</td>
            <td>{{ $mapel->nama }}</td>
            <td>{{ $mapel->guru->nama }}</td>
            <td>{{ $mapel->pivot->semester }}</td>
            <td>{{ $mapel->pivot->nilai }}</td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
    </tbody>
</table>
