<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faq extends Model
{
    use CrudTrait;

    use HasFactory;

    protected $fillable = [
        'id',
        'content',
        'created_at',
        'updated_at'
    ];
}
