<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'telephone',
        'balance',
        'credit_limit',
        'discount',
        'registration_date',
        'client_status',
    ];

    

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    
    }
}
