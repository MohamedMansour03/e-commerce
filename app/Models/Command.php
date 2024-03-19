<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $fillable = ['product_id', 'product_name', 'price', 'quantity', 'subtotal']; // Assurez-vous d'avoir défini les attributs fillable

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
