<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    public function scopeById($q, $id)
    {
        return $q->where('user_id', $id);
    }

    public function followable()
    {
        return $this->morphTo();
    }
}
