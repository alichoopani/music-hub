<?php

namespace App\Http\Controllers;

use     App\Models\Album;
use App\Models\Like;
use App\Models\Track;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(Request $request)
    {
//        $albums = Album::query()
//            ->where('approve', 1)
//            ->when($request->get('filter'), function ($query) use ($request) {
//                if ($request->get('filter') == 'Date') {
//                    $query->orderByDesc('publish');
//                } elseif ($request->get('filter') == 'A-Z') {
//                    $query->orderBy('title');
//                }
//            })
//            ->paginate(8);

        $albums = Album::query()
            ->where('approve', 1)
            ->orderByDesc('publish')
            ->limit(4)
            ->get();

        $randomAlbums = Album::query()
            ->where('approve', 1)
            ->orderBy('title')
            ->paginate(12);

        return view('albums.index',
            [
                'albums' => $albums,
                'randomAlbums' => $randomAlbums
            ]);
    }

    public function album($id)
    {
        $album = Album::query()->findOrFail((int)$id);

        $tracks = Track::query()
            ->where('album_id', $album->id)
            ->where('approve', 1)
            ->get();

        $countLikes = Like::query()
            ->where('likeable_id', $id)->count();

        return view('albums.detail',
            [
                'album' => $album,
                'tracks' => $tracks,
                'countLikes' => $countLikes
            ]);
    }
}
