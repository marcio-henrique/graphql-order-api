<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    public function lineItems()
    {
        return $this->hasMany(LineItem::class);
    }
}
