<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';
    protected $fillable = ['kode', 'nama', 'guru_id'];

    public function guru()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['semester', 'nilai'])->withTimestamps();
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class);
    }
}
