<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class BrowseController extends Controller
{
    public function featuredTracks()
    {
        $featured = Track::query()
            ->with(['Artist'])
            ->orderByDesc('plays')
            ->paginate(21);
        return view('browse.featured.index', ['featured' => $featured]);
    }

    public function latestTracks()
    {
        $latest = Track::query()
            ->orderByDesc('publish')
            ->paginate(21);

        return view('browse.latest.index', ['latest' => $latest]);
    }

    public function podcasts()
    {
        $podcasts = Track::query()
            ->where('category_id', 16)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $exclusivePodcasts = Track::query()
            ->where('category_id', 16)
            ->inRandomOrder()
            ->paginate(21);

        return view('browse.podcast.index',
            [
                'podcasts' => $podcasts,
                'exclusivePodcasts' => $exclusivePodcasts
            ]);
    }

    public function popularTracks()
    {
        $popular = Track::query()
            ->with(['Artist'])
            ->withCount('likes')
            ->orderByDesc('likes_count')
            ->paginate(21);

        return view('browse.popular.index', ['popular' => $popular]);
    }

    public function travelTracks()
    {
        $travel = Track::query()
            ->inRandomOrder()
            ->paginate(21);

        return view('browse.travel.index', ['travel' => $travel,]);
    }

}
