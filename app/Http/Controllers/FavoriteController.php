<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Bookmark;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Track;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function likes()
    {
        $likes = Like::query()
            ->with([
                'likeable' => function (MorphTo $morphTo) {
                    $morphTo->morphWith([
                        Album::class,
                        Track::class
                    ]);
                }])
            ->where('user_id', \Auth::id())
            ->orderBy('created_at')
            ->paginate(12);

        return view('pages.likes', ['likes' => $likes]);
    }

    public function bookmarks()
    {
        $bookmarks = Bookmark::query()
            ->with('bookmarkable')
            ->where('user_id', \Auth::id())
            ->orderBy('created_at')
            ->paginate(12);

        return view('pages.bookmarks', ['bookmarks' => $bookmarks]);
    }

    public function followArtists()
    {
        $follow = Follow::query()
            ->with('followable')
            ->where('user_id', \Auth::id())
            ->where('followable_type', '=', 'App\\Models\\Artist')
            ->orderBy('created_at')
            ->paginate(10);

        return view('pages.follows.artists', ['follow' => $follow]);
    }

    public function followCategories()
    {
        $follow = Follow::query()
            ->with('followable')
            ->where('user_id', \Auth::id())
            ->where('followable_type', '=', 'App\\Models\\Category')
            ->orderBy('created_at')
            ->paginate(10);

        return view('pages.follows.categories', ['follow' => $follow]);
    }
}
