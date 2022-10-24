@section('title', 'Share Track')
@extends('layouts.index')
@section('content')
    <div class="max-w-[73%] sm:max-w-[66%] md:max-w-[51%] lg:max-w-[36%] mx-auto my-6">
        <div class="w-full">
            <div class="grid rounded-md w-full h-[18rem] sm:h-[21rem] bg-gradient-to-r from-[#F9355D] to-[#C128EF]">
                <div class="grid grid-cols-4 lg:gap-2">
                    <div class="col-span-3 pl-4">
                        <img
                            class="cursor-default object-cover mx-auto rounded-lg max-h-[13rem] sm:max-h-[16rem] w-full mt-3"
                            src="{{asset('/storage' . $track->image)}}" alt="music">
                    </div>
                    <div class="col-span-1 text-5xl sm:text-6xl text-white font-bold cursor-default my-3 mx-auto">
                        {!!Share::page('https://readerstacks.com', 'Share title',["target"=>"_blank"])
                            ->facebook()
                            ->twitter()
                            ->linkedin('Extra linkedin summary can be passed here')
                            ->whatsapp();
                        !!}
                    </div>
                </div>
                <div class="flex flex-wrap gap-1 sm:gap-2 mx-auto my-2">
                    <div class="group">
                        <a href="#" onclick="javascript:window.history.back(-1);return false;">
                            <button class="flex flex-row px-5 transition group-hover:bg-white group-hover:text-black
                                duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                                <div class="text-xs font-bold">close</div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
