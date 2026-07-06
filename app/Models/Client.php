<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'balance',
        'credit_limit',
        'discount',
        'registration_date',
        'client_status',
    ];

   
    protected $casts = [
        'balance'           => 'decimal:2',
        'credit_limit'      => 'decimal:2',
        'discount'          => 'decimal:2',
        'registration_date' => 'date',
    ];

    

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id');
    
    }
}
