<?php

namespace App\Models;

use App\View\Helpers\Image;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use CrudTrait;
    use HasFactory;
    use Image;

    protected $casts = [
        'publish' => 'date'
    ];

    protected $fillable = [
        'id',
        'title',
        'artist_id',
        'publish',
        'image',
        'category_id',
        'approve',
        'created_at',
        'updated_at'
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function bookmarks()
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setImageAttribute($value)
    {
        $this->setImageFunction($value, 'image', '/album');
    }
}
