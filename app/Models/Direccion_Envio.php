<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion_Envio extends Model
{
    protected $fillable=[
        'client_id',
        'number',
        'street',
        'neighborhood',
        'city',
        'reference_location',
        'states_address'];

        public function client()
    {
        return $this->hasOne(client::client());
}

}

