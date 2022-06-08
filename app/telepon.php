<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class telepon extends Model
{
    protected $table='telepon';
    protected $primaryKey='id_siswa';
    protected $fillable=['id_siswa', 'nomor_telepon'];

    public function siswa(){
        return $this->belongsTo('App\siswa', 'id_siswa');
    }
}
