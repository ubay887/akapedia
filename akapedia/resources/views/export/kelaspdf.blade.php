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
            <th>Nama</th>
            <th>Kelas</th>
        </tr>
    </thead>
    <tbody>
        @php
        $no = 1;
        @endphp
        @foreach($kelas->siswa as $siswa)
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>{{ $kelas->kelas }}</td>
        </tr>
        @php
        $no++;
        @endphp
        @endforeach
    </tbody>
</table>
