<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPersediaan extends Model
{
    protected $fillable = [
        'nama',
    ];

    public function persediaans()
    {
        return $this->hasMany('App\Persediaan');
    }
}
