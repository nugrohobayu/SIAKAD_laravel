<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';


    protected $fillable = [
        'nisn',
        'nama_siswa',
        'tgl_lahir',
        'jenis_kelamin',
        'id_kelas'
    ];

    protected $dates = ['tgl_lahir'];

    public function getNamaSiswaAttribute($nama_siswa){
        return ucwords($nama_siswa);
    }

    public function getHobiSiswaAttribute(){
        return $this->hobi->pluck('id')->toArray();
    }

    // public function setNamaSiswaAttribute($nama_siswa){
    //     return strtolower($nama_siswa);
    // }

    public function telepon(){
        return $this->hasOne('App\telepon', 'id_siswa');
    }

    public function kelas(){
        return $this->belongsTo('App\kelas', 'id_kelas');
    }

    public function hobi(){
        return $this->belongsToMany('App\hobi', 'hobi_siswa', 'id_siswa', 'id_hobi')->withTimeStamps();
    }

}
