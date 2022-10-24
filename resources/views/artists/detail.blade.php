@section('title', 'Artist Detail')
@extends('layouts.index')
@section('content')
    <div class="max-w-[81%] mx-auto mb-2">
        <div class="w-full flex flex-col relative">
            <img class="object-cover rounded-lg rounded-b-lg w-full h-full absolute top-0 left-0 object-cover"
                 src="{{asset('storage/' . $artist->image)}}" alt="_"/>
            <div
                class="w-full h-[20rem] flex flex-col items-center justify-end text-center gap-2 pt-20 pb-8 z-20 bg-gradient-to-t from-[#202020]">
                <span class="text-3xl font-extrabold text-white cursor-default">{{$artist->title}}</span>
                <div class="flex flex-row text-[#91968E] font-bold text-sm mb-4 cursor-default">
                    <img class="h-4" src="{{asset('/storage/icons/user.svg')}}" alt="_"/>{{ $countFollows }} Followers
                </div>
                <div class=" flex flex-row flex-shrink-0 gap-2">
                    @livewire('follow', ['itemId' => $artist->id, 'type' => 'artist'])
                    <div class="group">
                        <a href="{{route('appNotification')}}">
                            <button class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black
                            duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                                <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                     src="{{asset('/storage/icons/share.svg')}}" alt="_"/>
                                <div class="text-xs text-bold">share</div>
                            </button>
                        </a>
                    </div>
                    <div class="group">
                        <a href="{{route('appNotification')}}">
                            <button class="whitespace-nowrap flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black
                             duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                                <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                     src="{{asset('/storage/icons/tablet.svg')}}" alt="_"/>
                                <div class="text-xs text-bold">open in app</div>
                            </button>
                        </a>
                    </div>
                </div>
                <span class="hover:brightness-75 font-bold text-[#656566] text-bold text-xs cursor-pointer">
                    Easy listening to {{$artist->title}}songs by MrTehran app.
                    <a href="{{route('appNotification')}}"> Click here to install.</a>
                </span>
            </div>
        </div>
    </div>
    @if($count > 0)
        <div class="max-w-[82%] py-6 mx-auto">
            <div class="flex">
                <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">Artists tracks</div>
                <div class="flex ml-auto">
                    <div class="group">
                        <button class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black
                         duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                            <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                 src="{{asset('/storage/icons/white-play.svg')}}" alt="_"/>
                            <div class="text-xs text-bold">play all</div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3 my-4">
                @foreach($trackDetail as $item)
                    <div class="bg-[#303030] flex rounded-md">
                        <a class="w-1/2" href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                            <img class="h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0 hover:opacity-60"
                                src="{{asset('storage/' . $item->image)}}" alt="music"></a>
                        <div class="w-full flex flex-col justify-center text-white capitalize py-3 text-base font-semibold min-h-[6rem]">
                        <span class="paragraph-ellipsis-2 leading-snug ml-2">
                            <a class="cursor-pointer hover:text-[#909090]"
                                href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">{{$item->title}}</a>
                        </span>
                            <div class=" capitalize text-sm text-[#989896] font-semibold">
                               <span class="paragraph-ellipsis-2 leading-snug ml-2">
                                   <a class="hover:underline"
                                      href="{{route('artistDetail', ['id' => $item->artist->id])}}">{{$item->artist->title}}</a>
                               </span>
                            </div>
                        </div>
                        <div class="flex flex-col pr-4">
                            <img class="h-20 transition hover:brightness-150 cursor-pointer hover:duration-50 my-auto"
                                 src="{{asset('/storage/icons/white-player.svg')}}" alt="_"/>
                        </div>
                    </div>
                @endforeach
            </div>
            @else
                <div class="max-w-[82%] py-6 mx-auto">
                    <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default mb-4">all tracks</div>
                    <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                        @foreach($allTracks as $item)
                            <div class="bg-[#303030] flex rounded-md">
                                <a class="w-1/2" href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                                    <img class="h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0 hover:opacity-60"
                                        src="{{asset('storage/' . $item->image)}}" alt="music">
                                </a>
                                <div class="w-full flex flex-col justify-center text-white capitalize py-3 text-base font-semibold min-h-[6rem]">
                                <span class="paragraph-ellipsis-2 leading-snug ml-2">
                                    <a class="cursor-pointer hover:text-[#909090]"
                                        href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">{{$item->title}}</a></span>
                                            <div class=" capitalize text-sm text-[#989896] font-semibold">
                                               <span class="paragraph-ellipsis-2 leading-snug ml-2">
                                                   <a class="hover:underline" href="{{route('artistDetail', ['id' => $item->artist->id ."-". $item->title])}}">
                                                       {{$item->artist->title}}</a>
                                               </span>
                                            </div>
                                        </div>
                                <div class="flex flex-col pr-4">
                                    <img class="h-20 transition hover:brightness-150 cursor-pointer hover:duration-50 my-auto"
                                        src="{{asset('/storage/icons/white-player.svg')}}" alt="_"/>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
    @endif
@endsection
