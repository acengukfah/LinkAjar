<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembukuan extends Model
{
    protected $fillable = [
        'no_dokumen', 'no_bukti', 'tgl_pembukuan', 'tgl_dokumen'
    ];

    public function persediaans()
    {
        return $this->hasMany('App\Persediaan','id','id');
    }
}
