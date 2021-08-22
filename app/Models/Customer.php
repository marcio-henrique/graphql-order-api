<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
