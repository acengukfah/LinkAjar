<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    //
    protected $fillable = [
        'nama', 'keterangan', 'kategori_id'
    ];

    public function kategori()
    {
        return $this->belongsTo('App\KategoriBarang');
    }

    public function details()
    {
        return $this->hasMany('App\Detail');
    }
}
