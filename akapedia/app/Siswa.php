<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $fillable = ['user_id', 'nama', 'email', 'password', 'jenis_kelamin', 'agama', 'alamat', 'no_tlp', 'avatar'];

    public function getAvatar()
    {
        if (!$this->avatar) {
            return asset('no-thumbnail.jpg');
        }

        return asset('siswa/'.$this->avatar);
    }

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['semester', 'nilai'])->withTimestamps();
    }

    public function rataNilai()
    {
        $total = 0;
        $hitung = 0;
        $hasil = 0;

        foreach ($this->mapel as $mapel){
            if ($mapel->pivot->nilai) {
                $total += $mapel->pivot->nilai;
                $hitung++;
                $hasil = round($total/$hitung);

            }
        }

        return $hasil;
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
