<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class A extends Model
{
    use HasFactory;
    protected $table = 'a_s';
    public function b()
    {
        return $this->belongsTo(B::class, 'b_s_id', 'id');
    }
}
