<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'collection_id',
        'product_name',
        'former_price',
        'new_price',
        'photo',
    ];

    public function collections()
    {
        return $this->belongsTo(Collection::class, 'collection_id', 'id');
    }
}
