<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswamodel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nama_siswa', 'tanggal_lahir', 'gender', 'alamat', 'id_kelas'
    ];

    public function prestasi(){
        return $this->hasMany('App\Prestasi', 'id');
    }
}
