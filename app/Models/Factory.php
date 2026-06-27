<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factory extends Model
{
    protected $fillable=[
        'Company_name',
        'factory_identificacion_fabrica',
        'contact_phone',
        'sales_email',
        'physical_address',
        'supplier_status'];

        public function factory(): HasMany 
    {
        return $this->hasMany(related: FactoryArticles::class);
        
    }
}
