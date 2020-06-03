<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $fillable = ['user_id', 'nama', 'email', 'password', 'jenis_kelamin', 'agama', 'alamat', 'no_tlp', 'jabatan', 'avatar'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('no-thumbnail.jpg');
        }

        return asset('pegawai/'.$this->avatar);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
