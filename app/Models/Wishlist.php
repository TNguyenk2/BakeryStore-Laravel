<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';

    protected $fillable = [
        'id_user',
        'id_product',
        'quantity'
    ];
    public function product()
    {
        return $this->hasMany(Product::class, 'id_product', 'id');
    }
}
