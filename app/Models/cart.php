<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $with = ['cart_items'];

    public function cart_items()
    {
        return $this->hasMany(cart_items::class);
    }
}
