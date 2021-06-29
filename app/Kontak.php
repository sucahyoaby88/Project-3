<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = "kontak";
    //default primaryKey adalah id
    protected $primarykey = "id_kontak";
    //untuk mematikan pengotomatisan insert kolom update at
    public $timestamps = false;

    protected $fillable = [
        'nama', 'email', 'nohp', 'alamat', 'username', 'password'
    ];
}
