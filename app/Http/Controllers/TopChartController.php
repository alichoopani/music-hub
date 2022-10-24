<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Constraint\Count;

class TopChartController extends Controller
{
    public function topOfWeek()
    {
        $topCharts = Track::query()
            ->where('approve', 1)
            ->withCount('likes')
            ->orderByDesc('plays')
            ->limit(21)
            ->get();

        $maxTracks = Track::query()
            ->where('approve', 1)
            ->count();

        return view('top-charts.top-songs-week.index',
            [
                'topCharts' => $topCharts,
                'maxTracks' => $maxTracks
            ]);
    }

    public function topOfMonth()
    {
        $topSongsMonth = Track::query()
            ->where('approve', 1)
            ->withCount('likes')
            ->orderByDesc('plays')
            ->limit(21)
            ->get();

        $maxTracks = Track::query()
            ->where('approve', 1)
            ->count();

        return view('top-charts.top-songs-month.index',
            [
                'topSongsMonth' => $topSongsMonth,
                'maxTracks' => $maxTracks
            ]);
    }

    public function topOfAllTime()
    {
        $topSongsOfAllTime = Track::query()
            ->where('approve', 1)
            ->withCount('likes')
            ->orderByDesc('likes_count')
            ->limit(21)
            ->get();

        $maxTracks = Track::query()
            ->where('approve', 1)
            ->count();

        return view('top-charts.top-songs-of-all-time.index',
            [
                'topSongsOfAllTime' => $topSongsOfAllTime,
                'maxTracks' => $maxTracks
            ]);
    }

    public function topArtists()
    {
        $topArtists = Artist::query()
            ->where('approve', 1)
            ->withCount('follows')
            ->orderByDesc('follows_count')
            ->limit(21)
            ->get();

        $maxArtists = Artist::query()
            ->where('approve', 1)
            ->count();

        return view('top-charts.top-artists.index',
            [
                'topArtists' => $topArtists,
                'maxArtists' => $maxArtists
            ]);
    }
}
