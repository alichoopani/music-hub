<div>
    <form wire:submit.prevent="addComment">
        @csrf
        @error('newComment')<span class="text-red-600">{{ $message }}</span> @enderror
        <div class="mt-3 mb-4 flex flex-wrap items-center justify-center overflow-hidden relative group">
            <input wire:model.lazy="newComment" type="text" placeholder="Your Comment"
                   class="contactInput mx-auto">
            <button type="submit" class="contactButton font-semibold transform group-hover:scale-110 object object-center mx-5">Send</button>
        </div>
        @if(session()->has('message'))
            <div class="mt-4 text-gray-100">
                {{session('message')}}
            </div>
        @endif
    </form>

    @foreach($comments as $item)
        <div class="commentShow justify-center mt-4 mb-2 py-2">
            <span class="text9">{{$item->user->username}} - {{$item->created_at->diffForHumans()}}</span>
            <br/>
            <span class="text9">{{$item->content}}</span>
        </div>
    @endforeach
    <div class="flex mb-2 mt-2">{{$comments->links()}}</div>
</div>
