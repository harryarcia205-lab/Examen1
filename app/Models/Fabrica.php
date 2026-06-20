<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fabrica extends Model
{
    protected $fillable=[
        'Company_name',
        'factory_identificacion_fabrica',
        'contact_phone',
        'sales_email',
        'physical_address',
        'supplier_status'];

         public function shipping_address()
    {
        return $this->hasMany(Shipping_address::class());
        
    }
}
