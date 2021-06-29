<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasi';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function siswa(){
        return $this->hasOne('App\Siswamodel', 'id_siswa');
    }
}
