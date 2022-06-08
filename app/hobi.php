<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hobi extends Model
{
    protected $table = 'hobi';

    protected $fillable = ['nama_hobi'];

    public function siswa(){
        return $this->belongsToMany('App\siswa', 'hobi_siswa', 'id_hobi', 'id_siswa');
    }
}
