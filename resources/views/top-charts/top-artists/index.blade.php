@section('title', 'Top Artist')
@extends('layouts.index')
@section('content')
    {{--    second navbar starts--}}
    <x-top-chart-headbar></x-top-chart-headbar>
    {{--    second navbar ends--}}

    {{--    top songs starts--}}
    <div class="max-w-[81%] mx-auto">
        <div class="py-2 mt-40 lg:my-0">
            <div class="flex flex-wrap">
                <div class="uppercase text-white text-2xl lg:text-3xl font-extrabold cursor-default">top artists</div>
            </div>
            @if($maxArtists > 21)
                @for ($count = 1; $count < 20; $count++)
                    <div class="w-full grid gap-4 grid gap-4 grid-cols-1 grid-rows-1 my-4">
                        <div class="bg-[#303030] flex rounded-md">
                            <a class="w-60" href="{{route('artistDetail', ['id' => $topArtists[$count-1]->id])}}">
                                <img class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                                    src="{{asset('storage/' . $topArtists[$count-1]->image)}}" alt="music"></a>
                            <div class="mx-4 my-8 text-[#979797] text-xl cursor-default">{{$count}}</div>
                            <div class="w-full flex flex-col justify-center text-white capitalize py-3 text-base font-semibold min-h-[6rem]">
                                <a href="{{route('artistDetail', ['id' => $topArtists[$count-1]->id])}}">
                                    <span class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug w-40 my-1">
                                        {{$topArtists[$count-1]->title}}</span></a>
                                <div class=" capitalize text-sm text-[#989896] font-semibold w-40">
                                    <a href="{{route('artistDetail', ['id' => $topArtists[$count-1]->id])}}">
                                        <span class="hover:underline cursor-pointer">
                                            <div class="flex">
                                                 <img class="h-4" src="{{asset('/storage/icons/user.svg')}}" alt="_"/>
                                                      <div class="pl-1 text-[#909090] font-semibold text-sm">
                                                        <span class="cursor-default paragraph-ellipsis-2 leading-snug font-bold text-center">{{ $topArtists[$count-1]->follows->count() }}</span>
                                                </div>
                                            </div>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="w-full text-[#686868] font-semibold my-8 flex text-center gap-2 flex-row-reverse">
                                <div><img class="pr-8 h-10 transition hover:brightness-150 cursor-pointer hover:duration-50"
                                        src="{{asset('/storage/icons/white-player.svg')}}" alt="_"/></div>
                                <div class="flex-1 cursor-default my-auto hidden lg:flex">{{ $topArtists[$count-1]->follows->count() }} Followers</div>
                                <div class="flex-1 cursor-default my-auto hidden lg:flex"></div>
                            </div>
                        </div>
                    </div>
                @endfor
            @else
                @for ($count = 1; $count <= $maxArtists; $count++)
                    <div class="w-full grid gap-4 grid gap-4 grid-cols-1 grid-rows-1 my-4">
                        <div class="bg-[#303030] flex rounded-md">
                            <a class="w-60" href="{{route('artistDetail', ['id' => $topArtists[$count-1]->id])}}">
                                <img class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                                    src="{{asset('storage/' . $topArtists[$count-1]->image)}}" alt="music">
                            </a>
                            <div class="mx-4 my-8 text-[#979797] text-xl cursor-default">{{$count}}</div>
                                <div class="w-full flex flex-col justify-center text-white capitalize py-3 text-base font-semibold min-h-[6rem]">
                                    <a href="{{route('artistDetail', ['id' => $topArtists[$count-1]->id])}}">
                                        <span class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug w-40 my-1">{{$topArtists[$count-1]->title}}</span></a>
                                            <div class=" capitalize text-sm text-[#989896] font-semibold w-40">
                                                <a href="{{route('artistDetail', ['id' => $topArtists[$count-1]->id])}}"></a>
                                                <span class="hover:underline cursor-pointer"></span>
                                                    <div class="flex">
                                                        <img class="h-4" src="{{asset('/storage/icons/user.svg')}}" alt="_"/>
                                                            <div class="pl-1 text-[#909090] font-semibold text-sm">
                                                                <span class="cursor-default paragraph-ellipsis-2 leading-snug font-bold text-center">{{ $topArtists[$count-1]->follows->count() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="w-full text-[#686868] font-semibold my-8 flex text-center gap-2 flex-row-reverse">
                                                <div><img class="pr-8 h-10 transition hover:brightness-150 cursor-pointer hover:duration-50"
                                                        src="{{asset('/storage/icons/white-player.svg')}}" alt="_"/></div>
                                                <div class="flex-1 cursor-default my-auto hidden lg:flex">{{ $topArtists[$count-1]->follows->count() }} Followers</div>
                                                <div class="flex-1 cursor-default my-auto hidden lg:flex"></div>
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

