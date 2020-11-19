<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    protected $fillable = [
        'no_dokumen', 'no_bukti', 'tgl_pembukuan', 'tgl_dokumen', 'detail_id', 'jenis_persediaan_id'
    ];

    public function jenis_persediaan()
    {
        return $this->belongsTo('App\JenisPersediaan');
    }

    public function detail()
    {
        return $this->belongsTo('App\Detail');
    }
}
