@section('title', 'Top Songs of Month')
@extends('layouts.index')
@section('content')
    {{--    second navbar starts--}}
    <x-top-chart-headbar></x-top-chart-headbar>
    {{--    second navbar ends--}}

    {{--    top songs starts--}}
    <div class="max-w-[81%] mx-auto">
        <div class="py-2 mt-40 lg:my-0">
            <div class="flex flex-wrap">
                <div class="uppercase text-white text-2xl lg:text-3xl font-extrabold cursor-default">top songs month</div>
                <div class="group ml-auto">
                    <button class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black
                     duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                        <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                             src="{{asset('/storage/icons/white-play.svg')}}" alt="_"/>
                        <div class="text-xs text-bold">play all</div>
                    </button>
                </div>
            </div>
            @if($maxTracks > 21)
                @for ($count = 1; $count <= 20; $count++)
                    <div class="w-full grid gap-4 grid gap-4 grid-cols-1 grid-rows-1 my-4">
                        <div class="bg-[#303030] flex rounded-md">
                            <a class="w-60" href="{{route('trackDetail', ['id' => $topSongsMonth[$count-1]->id ."-". $topSongsMonth[$count-1]->title])}}">
                                <img class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                                     src="{{asset('storage/' . $topSongsMonth[$count-1]->image)}}" alt="music"></a>
                            <div class="mx-4 my-8 text-[#979797] text-xl cursor-default">{{$count}}</div><div
                                class="w-full flex flex-col justify-center text-white capitalize py-3 text-base font-semibold min-h-[6rem]">
                                <a href="{{route('trackDetail', ['id' => $topSongsMonth[$count-1]->id ."-". $topSongsMonth[$count-1]->title])}}">
                                    <span class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug w-40">
                                        {{$topSongsMonth[$count-1]->title}}</span>
                                </a>
                                <div class=" capitalize text-sm text-[#989896] font-semibold w-40">
                                    <a href="{{route('artistDetail', ['id' => $topSongsMonth[$count-1]->id ."-". $topSongsMonth[$count-1]->title])}}">
                                        <span class="hover:underline cursor-pointer">{{$topSongsMonth[$count-1]->artist->title}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="w-full text-[#686868] font-semibold my-8 flex text-center gap-2 flex-row-reverse">
                                <div>
                                    <img class="pr-8 h-10 transition hover:brightness-150 cursor-pointer hover:duration-50"
                                         src="{{asset('/storage/icons/white-player.svg')}}" alt="_"/></div>
                                <div class="flex-1 cursor-default my-auto hidden lg:flex">{{ $topSongsMonth[$count-1]->publish->format('d/m/Y') }}</div>
                                <div class="flex-1 cursor-default my-auto hidden lg:flex">{{ $topSongsMonth[$count-1]->likes->count() }} likes</div>
                                <div class="flex-1 cursor-default my-auto hidden lg:flex">{{ $topSongsMonth[$count-1]->plays }} plays</div>
                            </div>
                        </div>
                    </div>
                @endfor
            @else
                @for ($count = 1; $count <= $maxTracks; $count++)
                    <div class="w-full grid gap-4 grid gap-4 grid-cols-1 grid-rows-1 my-4">
                        <div class="bg-[#303030] flex rounded-md">
                            <a class="w-60" href="{{route('trackDetail', ['id' => $topSongsMonth[$count-1]->id ."-". $topSongsMonth[$count-1]->title])}}">
                                <img class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                                     src="{{asset('storage/' . $topSongsMonth[$count-1]->image)}}" alt="music"></a>
                            <div class="mx-4 my-8 text-[#979797] text-xl cursor-default">{{$count}}</div><div
                                class="w-full flex flex-col justify-center text-white capitalize py-3 text-base font-semibold min-h-[6rem]">
                                <a href="{{route('trackDetail', ['id' => $topSongsMonth[$count-1]->id ."-". $topSongsMonth[$count-1]->title])}}">
                                    <span class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug w-40">
                                        {{$topSongsMonth[$count-1]->title}}</span>
                                </a>
                                <div class=" capitalize text-sm text-[#989896] font-semibold w-40">
                                    <a href="{{route('artistDetail', ['id' => $topSongsMonth[$count-1]->id ."-". $topSongsMonth[$count-1]->title])}}">
                                        <span class="hover:underline cursor-pointer">{{$topSongsMonth[$count-1]->artist->title}}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="w-full text-[#686868] font-semibold my-8 flex text-center gap-2 flex-row-reverse">
                                <div>
                                    <img class="pr-8 h-10 transition hover:brightness-150 cursor-pointer hover:duration-50"
                                         src="{{asset('/storage/icons/white-player.svg')}}" alt="_"/></div>
                                <div class="flex-1 cursor-default my-auto hidden lg:flex">{{ $topSongsMonth[$count-1]->publish->format('d/m/Y') }}</div>
                                <div class="flex-1 cursor-default my-auto hidden lg:flex">{{ $topSongsMonth[$count-1]->likes->count() }} likes</div>
                                <div class="flex-1 cursor-default my-auto hidden lg:flex">{{ $topSongsMonth[$count-1]->plays }} plays</div>
                            </div>
                        </div>
                    </div>
                @endfor
            @endif
        </div>
    </div>

    {{--    top songs ends--}}

    {{--    image starts--}}
    <div class="my-4">
        <a href="{{ route('appNotification') }}">
            <img class="cursor-pointer max-w-[82%] w-1/1 mx-auto rounded-lg" src="{{asset('/storage/apppromotebg.jpg')}}" alt="music">
        </a>
    </div>
    {{--    image ends--}}

@endsection

