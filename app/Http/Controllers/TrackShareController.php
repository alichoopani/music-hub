<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackShareController extends Controller
{
    public function index($id)
    {
        $track = Track::query()
            ->where('id', $id)
            ->first();

        return view('pages.share-track',
            [
                'track' => $track
            ]
        );
    }
}
