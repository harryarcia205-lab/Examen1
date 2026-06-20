<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable=[
        'internal_code,'
        'detailed_description',
        'current_selling_price',
        'average_purchase_cost',
        'availability_status',
        'entry_date'];

         public function client()
    {
        return $this->hasOne(client::client());

}
