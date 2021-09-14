<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
     protected $with=[ 'transactionItems','client','paymentMethod'];

    public function transactionItems(){
        return $this->hasMany(transactionItems::class);
    }

    public function client(){
        return $this->belongsTo(customer::class);
    }

    public function stock(){
        return $this->belongsTo(stock::class);
    }

    public function paymentMethod(){
        return $this->belongsTo(paymentMethods::class);
    }
}
