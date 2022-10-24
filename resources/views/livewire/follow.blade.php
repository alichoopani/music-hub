<div class="group">
    <button class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm"
            wire:click="follow()">
        <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
             src="{{ $this->follows ? asset('storage/icons/follow2.svg') : asset('storage/icons/follow.svg') }}" />
        <div class="text-xs text-bold whitespace-nowrap">follow</div>
    </button>
</div>
