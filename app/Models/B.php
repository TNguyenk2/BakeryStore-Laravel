<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class B extends Model
{
    use HasFactory;
    protected $table = 'b_s';
    public function a()
    {
        return $this->hasMany(A::class, 'b_s_id', 'id');
    }
}
