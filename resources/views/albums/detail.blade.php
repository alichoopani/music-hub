@section('title', 'Album Detail')
@extends('layouts.index')
@section('content')
    <div class="w-full sm:max-w-[81%] mx-auto mb-2">
        <div class="w-full flex flex-col relative">
            <img class="object-cover rounded-lg rounded-b-lg w-full h-full absolute top-0 left-0 object-cover"
                 src="{{asset('storage/' . $album->image)}}" alt="_"/>
            <div class="w-full h-[20rem] flex flex-col items-center justify-end text-center gap-2 pt-20 pb-8 z-20 bg-gradient-to-t from-[#202020]">
                <span class="text-3xl font-extrabold text-white cursor-default">{{ $album->title }}</span>
                <div class="flex flex-row text-[#91968E] font-bold text-sm mb-4 cursor-default gap-1">
                    <img class="h-3 my-1" src="{{asset('/storage/icons/like.svg')}}" alt="_"/>
                    <div class="capitalize cursor-default">{{ $countLikes }} Likes</div>
                </div>
                <div class=" flex flex-row flex-shrink-0 gap-1 sm:gap-2">
                    <div class="group">
                        @livewire('like', ['itemId' => $album->id, 'type' => 'album'])
                    </div>
                    <div class="group">
                        @livewire('bookmark', ['itemId' => $album->id, 'type' => 'album'])
                    </div>
                    <div class="group">
                        <a href="{{route('appNotification')}}">
                            <button class="flex flex-row px-3 sm:px-6 transition group-hover:bg-white group-hover:text-black
                             duration-300 rounded-full capitalize border border-white px-8 py-2 text-white font-semibold text-sm">
                                <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                     src="{{asset('/storage/icons/tablet.svg')}}" alt="_"/>
                                <div class="text-xs text-bold whitespace-nowrap">open in app</div>
                            </button>
                        </a>
                    </div>
                </div>
                <span class="hover:brightness-75 font-bold text-[#656566] text-bold text-xs cursor-pointer"> <a
                        href="{{ route('appNotification') }}">Easy listening to {{ $album->artist->title }} songs by MrTehran app. Click here to install.</a></span>
            </div>
        </div>
    </div>
        @if($tracks->count())
    <div class="max-w-[82%] py-6 mx-auto">
        <div class="flex">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">Albums tracks</div>
        </div>
        <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3 my-4">
            @foreach($tracks as $item)
            <div class="bg-[#303030] flex rounded-md">
                <a class="w-1/2" href="{{ route('trackDetail', ['id' => $item->id ."-". $item->title]) }}">
                    <img class="h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0 hover:opacity-60"
                        src="{{asset('storage/' . $item->image)}}" alt="music"></a>
                <div class="w-full flex flex-col justify-center text-white capitalize py-3 text-base font-semibold min-h-[6rem]">
                        <span class="paragraph-ellipsis-2 leading-snug ml-2">
                            <a class="cursor-pointer hover:text-[#909090]"
                                href="{{ route('trackDetail', ['id' => $item->id ."-". $item->title]) }}">{{ $item->title }}</a>
                        </span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                           <span class="paragraph-ellipsis-2 leading-snug ml-2">
                               <a class="hover:underline"
                                  href="{{ route('artistDetail', ['id' => $item->artist->id ."-". $item->artist->title]) }}">{{ $item->artist->title }}</a></span>
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
{{--                @else--}}
{{--                    <div class="max-w-[82%] py-6 mx-auto">--}}
{{--                        <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3">--}}
{{--                            @foreach($allTracks as $item)--}}
{{--                                <div class="bg-[#303030] flex rounded-md">--}}
{{--                                    <a class="w-1/2" href="#"><img--}}
{{--                                            class="h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0 hover:opacity-60"--}}
{{--                                            src="{{asset('storage/contactUs.jpg')}}"--}}
{{--                                            alt="music"></a>--}}
{{--                                    <div--}}
{{--                                        class="w-full flex flex-col justify-center text-white capitalize py-3 text-base font-semibold min-h-[6rem]">--}}
{{--                            <span--}}
{{--                                class="paragraph-ellipsis-2 leading-snug ml-2"><a--}}
{{--                                    class="cursor-pointer hover:text-[#909090]"--}}
{{--                                    href="#">title</a></span>--}}
{{--                                        <div class=" capitalize text-sm text-[#989896] font-semibold">--}}
{{--                               <span--}}
{{--                                   class="paragraph-ellipsis-2 leading-snug ml-2"> <a class="hover:underline"--}}
{{--                                                                                      href="#">artist title</a></span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex flex-col pr-4">--}}
{{--                                        <img--}}
{{--                                            class="h-20 transition hover:brightness-150 cursor-pointer hover:duration-50 my-auto"--}}
{{--                                            src="{{asset('/storage/icons/white-player.svg')}}" alt="_"/>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--            </div>--}}
        @endif
@endsection
