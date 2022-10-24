<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use App\Models\Track;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Search extends Component
{
    public $query;
    public $tracks;

    public function render()
    {
        if (isset($this->query) && strlen($this->query) >= 2) {
            $artists = Artist::query()
                ->select('artists.id as artist_id', 'artists.image', 'artists.title as artist_title', 'artists.bio',
                    DB::raw('"artist" AS type'))
                ->where('artists.title', 'like', '%' . $this->query . '%');

            $this->tracks = Track::query()
                ->with('artist')
                ->select('tracks.id as track_id', 'tracks.image', 'tracks.title as track_title', 'tracks.artist_id',
                    DB::raw('"track" AS type'))
                ->where('tracks.title', 'like', '%' . $this->query . '%')
                ->union($artists)
                ->get();
        } else {
            $this->tracks = [];
        }
        sleep(1);

        return view('livewire.search');
    }
}
