<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DebtProducts;

class Debt extends Model
{
    use HasFactory;
    protected $with = ['products'];

    public function products(){
        return $this->hasMany(DebtProducts::class);
    }
}
