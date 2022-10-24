<?php

namespace App\Models;

use App\View\Helpers\Image;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
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
        'lyrics',
        'file',
        'publish',
        'album_id',
        'category_id',
        'artist_id',
        'image',
        'approve'
    ];


    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function bookmarks()
    {
        return $this->morphMany(Bookmark::class, 'bookmarkable');
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setImageAttribute($value)
    {
        $this->setImageFunction($value, 'image', '/track');
    }

    public function setFileAttribute($value)
    {
        $this->uploadFileToDisk($value, 'file', 'public', 'file');
    }
}

