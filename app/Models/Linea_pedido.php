<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linea_pedido extends Model
{
    protected $fillable=[
        'article_id',
        'requested_quantity',
        'unit_price',
        'line_subtotal'];

        public function article()
    {
        return $this->hasMany(article::article());
        
    }
}
