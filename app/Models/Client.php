<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
protected $fillable=[
        'name',
        'email',
        'phone number',
        'balance',
        'credit limit',
        'discount',
        'registration date',
        'client status'];

        public function shipping_address()
    {
        return $this->hasMany(Shipping_address::class());
        
    }

    public function order()
    {
        return $this->hasMany(Order::class); 
        
    }
    }