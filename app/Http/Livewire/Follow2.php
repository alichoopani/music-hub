<?php

namespace App\Http\Livewire;

use App\Models\Artist;
use App\Models\Category;
use Livewire\Component;

class Follow2 extends Component
{
    public $type;
    public $item;
    public $itemId;
    public $follows;

    public function follow()
    {
        if (\Auth::check()) {
            if (isset($this->follows)) {
                $this->follows->delete();
            } else {
                $addFollow = new \App\Models\Follow();
                $addFollow->user_id = \Auth::id();
                $this->item->follows()->save($addFollow);
            }
        } else {
            $this->redirect(route('login'));
        }
    }

    public function render()
    {
        if ($this->type == 'artist')
            $this->item = Artist::query()->select('id')->find($this->itemId);
        elseif ($this->type = 'categories')
            $this->item = Category::query()->select('id')->find($this->itemId);

        $this->follows = $this->item->follows()->where('user_id', \Auth::id())->first();

        return view('livewire.follow2');
    }
}
