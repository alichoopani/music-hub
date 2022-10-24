<?php

namespace App\Models;

use App\View\Helpers\Image;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use CrudTrait;
    use HasFactory;
    use Image;


    protected $fillable = [
        'id',
        'title',
        'bio',
        'image',
        'approve',
        'created_at',
        'updated_at'
    ];

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    public function follows()
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    public function setImageAttribute($value)
    {
        $this->setImageFunction($value, 'image', '/artist');
    }
}
