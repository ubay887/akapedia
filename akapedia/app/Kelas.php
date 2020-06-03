<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "kelas";
    protected $fillable = ['guru_id', 'kelas'];
    protected $date = ['created_at'];

    public function guru()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['siswa_id'])->withTimestamps();
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['hari'])->withTimestamps();
    }
}
