<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShippingAddress extends Model
{
    protected $fillable=[
        'client_id',
        'number',
        'street',
        'neighborhood',
        'city',
        'reference_location',
        'states_address'];

        public function client(): BelongsTo
    {
        return $this->belongsTo(related: client::class);
}

        public function order(): HasMany
        {
            return $this->hasMany(related: order::class);

}

}