<div class="group">
    <button class="flex flex-row px-3 sm:px-4 transition group-hover:bg-white group-hover:text-black
                             duration-300 rounded-full capitalize border border-white py-2 text-white
                             font-semibold text-sm" wire:click="like">
        <img class="h-4 mr-1 transition group-hover:brightness-0 group-hover:duration-300"
             src="{{ $like ? asset('storage/icons/fillLike.svg') : asset('storage/icons/like.svg') }}" />
        <div class="text-xs text-bold whitespace-nowrap">like</div>
    </button>
</div>
