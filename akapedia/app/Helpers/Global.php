<?php

use App\Artikel;
use App\Berita;
use App\Siswa;
use App\Pegawai;
use App\Promosi;

function total_siswa()
{
    return Siswa::count();
}

function total_pegawai()
{
    return Pegawai::count();
}

function total_berita()
{
    return Berita::count();
}

function total_promosi()
{
    return Promosi::count();
}

function total_pengumuman()
{
    return Artikel::count();
}

?>
