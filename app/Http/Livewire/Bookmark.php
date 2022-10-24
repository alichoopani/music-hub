<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\Track;
use Livewire\Component;

class Bookmark extends Component
{
    public $type;
    public $item;
    public $itemId;
    public $bookmarks;

    public function bookmark()
    {
        if (\Auth::check()) {
            if (isset($this->bookmarks)) {
                $this->bookmarks->delete();

                session()->flash('message', 'Bookmark have been removed 😈');
            } else {
                $addBookmark = new \App\Models\Bookmark();
                $addBookmark->user_id = \Auth::id();
                $this->item->bookmarks()->save($addBookmark);

                session()->flash('message', 'You added this to Bookmarks ☺️');
            }
        } else {
            $this->redirect(route('login'));
        }
    }

    public function render()
    {
        if ($this->type == 'track')
            $this->item = Track::query()->select('id')->find($this->itemId);
        elseif ($this->type == 'album')
            $this->item = Album::query()->select('id')->find($this->itemId);
        $this->bookmarks = $this->item->bookmarks()->where('user_id', \Auth::id())->first();

        return view('livewire.bookmark');
    }
}
