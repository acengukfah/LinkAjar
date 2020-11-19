<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $fillable = [
        'jumlah', 'barang_id', 'harga_satuan'
    ];

    public function persediaan()
    {
        return $this->hasOne('App\Persediaan');
    }

    public function barang()
    {
        return $this->belongsTo('App\Barang');
    }
}
