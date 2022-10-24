<div class="group">
    <button class="bg-[#303030] flex flex-row pl-5 px-2 transition group-hover:bg-[#505050] group-hover:text-black
                             duration-300 rounded-sm rounded-tl-full capitaliz py-4 pb-2 text-white
                             font-semibold text-sm" wire:click="bookmark">
        <img class="h-6 mr-1 transition group-hover:brightness-0 group-hover:duration-300"
             src="{{ $bookmarks ? asset('storage/icons/fillBookmark.svg') : asset('storage/icons/bookmark.svg') }}" />
    </button>
</div>
