<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $guarded = [];

    public function ship()
    {
        return $this->belongsTo(Ship::class, 'ship_id');
    }
}
