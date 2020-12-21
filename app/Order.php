<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function userOrder()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function billOrder()
    {
        return $this->belongsTo(Bill::class, 'bill_id');
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
