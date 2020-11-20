<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    protected $fillable = [
        'jumlah', 'barang_id', 'harga_satuan','pembukuan_id','jenis_persediaan_id'
    ];
    
    public function pembukuan()
    {
        return $this->belongsTo('App\Pembukuan');
    }
    public function jenis_persediaan()
    {
        return $this->belongsTo('App\JenisPersediaan');
    }

    public function barang()
    {
        return $this->belongsTo('App\Barang');
    }
}
