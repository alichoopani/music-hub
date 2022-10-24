<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Like;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index(Request $request)
    {
        $tracks = Track::query()
            ->where('approve', 1)
            ->when($request->get('filter'), function ($query) use ($request) {
                if ($request->get('filter') == 'Date') {
                    $query->orderBy('publish', 'ASC');
                } elseif ($request->get('filter') == 'A-Z') {
                    $query->orderBy('title');
                }
            })
            ->paginate(8);

        return view('track.index', ['tracks' => $tracks]);
    }

    public function tracks($id)
    {
        $track = Track::query()
            ->with(['artist', 'category', 'album'])
            ->findOrFail($id);

        $similarTracks = Track::query()
            ->where('category_id', $track->category_id)
            ->whereNot('id', $id)
            ->where('approve', 1)
            ->inRandomOrder()
            ->limit(6)
            ->get();

        $albumTracks = Track::query()
            ->where('approve', 1)
            ->whereNot('id', $id)
            ->where('album_id', $track->album_id)
            ->get();

        $countLikes = Like::query()
            ->where('likeable_id', $id)
            ->count();

        return view('track.detail',
            [
                'track' => $track,
                'similarTracks' => $similarTracks,
                'albumTracks' => $albumTracks,
                'countLikes' => $countLikes
            ]);
    }

    public function increment($id)
    {
        $incrementPlays = Track::query()
            ->findOrFail($id);

        $incrementPlays->plays = $incrementPlays->plays += 1;
        $incrementPlays->save();

        return response()->json(['code' => 200]);
    }
}
