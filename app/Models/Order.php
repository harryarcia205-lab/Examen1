<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class order extends Model
{
    protected $fillable=[
        'client_id',
        'id address',
        'date_time_creation',
        'subtotal',
        'tax_amount',
        'grand_total',
        'additional_notes',
        'order_status'];

        public function client(): BelongsTo
    {
        return $this->belongsTo(related: client::class);
}

    public function Shipping_address()
    {
        return $this->belongsTo(related: shippingAddress::class);
    }


}
