<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

        public function client()
    {
        return $this->hasOne(client::client());
}

    public function Shipping_address()
    {
        return $this->belongsTo(Shipping_address::Shipping_address());
}
}
