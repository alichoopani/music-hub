<?php

namespace App\Models;

use App\View\Helpers\Image;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use CrudTrait;
    use HasFactory;
    use Image;

    protected $fillable = [
        'id',
        'title',
        'image',
        'created_at',
        'updated_at'
    ];


    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }

    public function follows()
    {
        return $this->morphMany(Follow::class, 'followable');
    }

    public function setImageAttribute($value)
    {
        $this->setImageFunction($value, 'image', '/category');
    }
}
