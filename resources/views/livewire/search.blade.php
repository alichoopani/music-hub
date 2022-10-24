<div class="w-full h-full flex-1 flex flex-col mt-1">
    <div class="w-full text-gray-300 flex items-center pl-4">
        <x-input id="search" wire:model="query" type="text" placeholder="Search"
                 class="placeholder-[#909090] text-white bg-[#202020] rounded-lg border border-gray-500 search gap-2 w-full flex-1"/>
        <div class="closebtn text-2xl text-gray-500 hover:text-gray-50 duration-200 p-3 pr-4 cursor-pointer" onclick="closeNav()">&times;</div>
    </div>

    <div wire:loading.delay class="flex font-semibold pt-5 searchResult justify-center text-center text-lg text-white brightness-75">
        loading...
    </div>

    <div class="w-full flex flex-col h-0 flex-1 overflow-y-auto">
        @if(count($tracks))
            <div class="flex flex-col items-center my-2">
                @foreach( $tracks as $item )
                    <div class="w-full">
                        <a href="{{route($item->type == 'track' ? 'trackDetail' : 'artistDetail', ['id'=> $item->track_id . '-' . $item->track_title])}}">
                            <div class="flex w-full items-center brightness-75 hover:brightness-100 hover:bg-[#313131] pr-2 rounded-lg md:rounded-none">
                                <div class="w-7/8 md:w-5/6 h-full flex-row w-full items-center px-4 text-white text-base font-semibold">
                                    <div class="flex flex-col">
                                        <div class="flex-col">
                                            {{ $item->track_title }}
                                        </div>
                                        <div class="flex-col text-xs text-gray-300">
                                            {{ isset($item->artist) ? $item->artist->title : ''  }}
                                        </div>
                                    </div>
                                </div>
                                <div class="h-full py-2">
                                    <img src="{{asset('storage/' . $item->image )}}" class="flex-row w-[3rem] h-[3rem] searchImage gap-5 rounded-lg flex-row h-full">
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @elseif(strlen($query) >= 3 && !count($tracks))
            <div class="flex font-semibold dropdown-menu-lg pt-5 searchResult justify-center">
                <div class="cursor-default font-semibold text-lg text-white brightness-75">NO RESULT FOUND!</div>
            </div>
        @endif
    </div>
</div>
