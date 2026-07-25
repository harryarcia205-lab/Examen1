<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FactoryArticles extends Model
{
    protected $fillable=[
        'article_id',
        'current_stock',
        'supplier_negotiated_cost',
        'estimated_delivery'];

        public function FactoryArticles(): BelongsTo
    {
        return $this->belongsTo(related: factory::class);
}

        public function article(): BelongsTo
        {
            return $this->belongsTo(related: Article::class);

}

}
