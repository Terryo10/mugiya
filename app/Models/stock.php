<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    use HasFactory;

    public function category(){
        return $this->hasMany(category::class);
    }
    public function products(){
        return $this->hasMany(product::class);
    }
}
