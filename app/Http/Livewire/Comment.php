<?php

namespace App\Http\Livewire;

use App\Models\Track;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $newComment;
    public $trackId;

    public function addComment()
    {
        $this->validate(['newComment' => 'required|max:255']);

        if (Auth::check()) {
            \App\Models\Comment::query()->with(['track'])->create([
                'user_id' => Auth::id(),
                'track_id' => $this->trackId,
                'content' => $this->newComment
            ]);
        }
        else{
            $this->redirect(route('login'));
        }

        $this->reset('newComment');
        session()->flash('message', 'Your message Submitted successfully 😄');
    }

    public function render()
    {
        $comments = \App\Models\Comment::with(['user', 'track'])->where('track_id', $this->trackId)->latest()->paginate(4);
//        $comment = \App\Models\Comment::where('track_id', $this->trackId)->paginate(6);

        return view('livewire.comment',
            [
                'comments' => $comments
            ]);
    }
}
