<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Category;
use App\Models\Follow;
use App\Models\Track;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $randomOrder = Track::query()
            ->where('approve', 1)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        $featured = Track::query()
            ->where('approve', 1)
            ->orderBy('title')
            ->limit(6)
            ->get();

        $latestTracks = Track::query()
            ->orderByDesc('publish')
            ->where('approve', 1)
            ->latest()
            ->limit(6)
            ->get();

        $recentlyAdded = Track::query()
            ->where('approve', 1)
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        $newAlbums = Album::query()
            ->orderByDesc('publish')
            ->where('approve', 1)
            ->latest()
            ->limit(4)
            ->get();

        $categories = Category::query()
            ->inRandomOrder()
            ->withCount('follows')
            ->limit(6)
            ->get();

        $topArtists = Artist::query()
            ->where('approve', 1)
            ->withCount('follows')
            ->orderByDesc('follows_count')
            ->limit(12)
            ->get();

        $bestOfTheMonth = Track::query()
            ->inRandomOrder()
            ->where('approve', 1)
            ->limit(6)
            ->get();

        return view('home.index',
            [
                'randomOrder' => $randomOrder,
                'featured' => $featured,
                'recentlyAdded' => $recentlyAdded,
                'latestTracks' => $latestTracks,
                'newAlbums' => $newAlbums,
                'categories' => $categories,
                'bestOfTheMonth' => $bestOfTheMonth,
                'topArtists' => $topArtists,
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
