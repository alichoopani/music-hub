@section('title', 'Artists')
@extends('layouts.index')
@section('content')
    {{--first flex starts--}}
    <div class="max-w-[81%] mx-auto">
        <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default mb-2">artists</div>
        <div class="flex flex-wrap">
            @foreach($artists as $item)
                <div class="w-full sm:w-1/2 md:w-1/4 text-center">
                    <a href="{{route('artistDetail', ['id' => $item->id ."-". $item->title])}}">
                        <img class="cursor-pointer hover:opacity-60 object-cover w-full aspect-square transition-opacity"
                            src="{{asset('storage/' . $item->image)}}" alt="music"></a>
                    <div class="mx-4 sm:mx-6 lg:mx-10 my-3 font-semibold text-white">
                        <span class="paragraph-ellipsis-2 leading-snug py-1">
                            <a class="hover:text-[#909090] cursor-pointer"
                                href="{{route('artistDetail', ['id' => $item->id ."-". $item->title])}}">
                                {{$item->title}}
                            </a>
                        </span>
                        <div class="flex justify-center">
{{--                            <img class="h-4" src="{{asset('/storage/icons/user.svg')}}" alt="_"/>--}}
                            <div class="pl-1 text-[#909090] font-semibold text-sm">
{{--                           <span class="cursor-default paragraph-ellipsis-2 leading-snug font-bold text-center">93.6k</span>--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{--first flex ends--}}

    {{--popular artists starts--}}
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">
        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">popular artists
            </div>
            <div class="flex">
                <div class="group">
                    <button class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black
                    duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                        <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                             src="{{asset('/storage/icons/white-play.svg')}}" alt="_"/>
                        <div class="text-xs text-bold">play all</div>
                    </button>
                </div>
                <a href="{{route('popular')}}">
                    <button class="transition hover:text-[#909090] capitalize text-white text-sm font-bold px-4 py-1">see all ></button>
                </a>
            </div>
        </div>
        <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3 mt-4">
            @foreach($popularArtists as $item)
                <div class="bg-[#303030] flex rounded-md">
                    <a class="w-1/2" href="{{route('artistDetail', ['id' => $item->id ."-". $item->title])}}">
                        <img class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                            src="{{asset('storage/' . $item->image)}}" alt="music"></a>
                    <div
                        class="w-full flex flex-col justify-center text-white capitalize pr-4 py-3 text-base font-semibold min-h-[6rem]">
                       <span class="paragraph-ellipsis-2 leading-snug my-1">
                           <a class="hover:text-[#909090] cursor-pointer"
                              href="{{route('artistDetail', ['id' => $item->id ."-". $item->title])}}">
                               {{$item->title}}</a>
                       </span>
                        <div class="flex">
                            <img class="h-4" src="{{asset('/storage/icons/user.svg')}}" alt="_"/>
                            <div class="pl-1 text-[#909090] font-semibold text-sm">
                           <span class="cursor-default paragraph-ellipsis-2 leading-snug font-bold text-center">{{ $item->follows->count() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-col font-bold my-auto pr-5 text-[#909090] cursor-default text-xl"> ></div>
                </div>
            @endforeach
        </div>
    </div>
    {{--popular artists ends--}}

    <div class="flex justify-center mb-2">
        {{ $popularArtists->links('pagination::tailwind') }}
    </div>

    <div class="my-4">
        <img class="cursor-pointer max-w-[82%] w-1/1 mx-auto rounded-lg" src="{{asset('/storage/apppromotebg.jpg')}}" alt="music">
    </div>

@endsection
