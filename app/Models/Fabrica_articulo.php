<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fabrica_articulo extends Model
{
    protected $fillable=[
        'article_id',
        'current_stock',
        'supplier_negotiated_cost',
        'estimated_delivery'];

          public function article()
    {
        return $this->hasMany(article::article());
}
}
