<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $table = 'shippingAddress';

    protected $fillable = [
        "client_id",
        "order_line_id",
        "number",
        "street",
        "neighborhood",
        "city",
        "reference_location",
        "state_address",
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function order_line()
    {
        return $this->belongsTo(Orderline::class);
    }
}