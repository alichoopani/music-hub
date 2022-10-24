<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Track;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(Request $request)
    {
        $artists = Artist::query()
            ->where('approve', 1)
//            ->when($request->get('filter'), function ($query) use ($request) {
//                if ($request->get('filter') == 'Newest') {
//                    $query->orderByDesc('created_at');
//                } elseif ($request->get('filter') == 'A-Z') {
//                    $query->orderBy('title');
//                }
//            })
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $popularArtists = Artist::query()
            ->where('approve', 1)
            ->withCount('follows')
            ->orderByDesc('follows_count')
            ->paginate(9);

        return view('artists.index',
            [
                'artists' => $artists,
                'popularArtists' => $popularArtists
            ]);
    }

    public function artist($id)
    {
        $artist = Artist::query()->findOrFail((int)$id);

        $trackDetail = Track::query()
            ->where('artist_id', $artist->id)
            ->where('approve', 1)
            ->get();

        $allTracks = Track::query()
            ->inRandomOrder()
            ->limit(6)
            ->get();

        $count = $trackDetail->count();

        $countFollows = Follow::query()
            ->where('followable_id', $id)
            ->count();

        return view('artists.detail', [
            'artist' => $artist,
            'trackDetail' => $trackDetail,
            'allTracks' => $allTracks,
            'count' => $count,
            'countFollows' => $countFollows
        ]);
    }
}
