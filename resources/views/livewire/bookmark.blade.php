<div class="group">
    <button class="flex flex-row px-3 sm:px-5 transition group-hover:bg-white group-hover:text-black
                             duration-300 rounded-full capitalize border border-white py-2 text-white
                             font-semibold text-sm" wire:click="bookmark">
        <img class="h-4 mr-1 transition group-hover:brightness-0 group-hover:duration-300"
             src="{{ $bookmarks ? asset('storage/icons/fillBookmark.svg') : asset('storage/icons/bookmark.svg') }}" />
        <div class="text-xs text-bold whitespace-nowrap">bookmark</div>
    </button>
</div>
