<?php

namespace App\Http\Livewire;

use App\Models\Album;
use App\Models\Track;
use Livewire\Component;

class Like extends Component
{
    public $type;
    public $itemId;
    public $item;
    public $like;

    public function like()
    {
        if (\Auth::check()) {
            if (isset($this->like)) {
                $this->like->delete();
            } else {
                $addLike = new \App\Models\Like();
                $addLike->user_id = \Auth::id();
                $this->item->likes()->save($addLike);
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

        $this->like = $this->item->likes()
            ->where('user_id', \Auth::id())
            ->first();

        return view('livewire.like');
    }
}
