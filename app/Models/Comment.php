<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'username',
        'comment',
        'id_product'
    ];
    public function product()
    {
        return $this->hasMany(Product::class, 'id_product', 'id');
    }
}
