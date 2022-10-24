@section('title', 'Podcasts')
@extends('layouts.index')
@section('content')
    {{--    second navbar starts--}}
    <x-browse-headbar></x-browse-headbar>
    {{--    second navbar ends--}}

    {{--first flex starts--}}
    @if($podcasts->count())
        <div class="max-w-[81%] py-2 mx-auto mt-44 md:my-0">
            <div class="flex flex-wrap">
                @foreach($podcasts as $item)
                    <div class="w-full sm:w-1/2 md:w-1/4 ">
                        <a href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                            <img
                                class="cursor-pointer hover:opacity-60 object-cover w-full aspect-square transition-opacity"
                                src="{{asset('storage/' . $item->image)}}" alt="music">
                        </a>
                        <div class="flex flex-row mt-2 mb-4 ml-4">
                            <img class="h-10 transition hover:brightness-150 cursor-pointer hover:duration-50"
                                 src="{{asset('/storage/icons/player.svg')}}" alt="_"/>
                            <div class="flex flex-row">
                                <div class="text-white ml-2 capitalize font-semibold">
                               <span class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug"><a
                                       href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">{{$item->title}}</a>
                               </span>
                                    <div class="capitalize text-sm">
                                        <div class="flex-row text-white cursor-default font-semibold">track by
                                            <a href="{{route('artistDetail', ['id' => $item->id ."-". $item->title])}}">
                                                <span
                                                    class="hover:underline cursor-pointer text-[#909090]">{{$item->artist->title}}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    {{--first flex ends--}}

    {{--exclusive podcast starts--}}
    @if($exclusivePodcasts->count())
        <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">
            <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
                <div
                    class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">
                    exclusive podcasts
                </div>
            </div>
            <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3 mt-4">
                @foreach($exclusivePodcasts as $item)
                    <div class="bg-[#303030] flex rounded-md">
                        <a class="w-1/2" href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                            <img
                                class="h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0 hover:opacity-60"
                                src="{{asset('storage/' . $item->image)}}" alt="music"></a>
                        <div
                            class="w-full flex flex-col justify-center text-white capitalize py-3 text-base font-semibold min-h-[6rem]">
                        <span class="paragraph-ellipsis-2 leading-snug ml-2">
                            <a class="cursor-pointer hover:text-[#909090]"
                               href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">{{$item->title}}</a>
                        </span>
                            <div class=" capitalize text-sm text-[#989896] font-semibold">
                           <span class="paragraph-ellipsis-2 leading-snug ml-2">
                               <a class="hover:underline"
                                  href="{{route('artistDetail', ['id' => $item->id ."-". $item->title])}}">
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
    {{--exclusive podcast ends--}}

    {{--pagination starts--}}
    <div class="flex justify-center">
        {{ $exclusivePodcasts->links('pagination::tailwind') }}
    </div>
    {{-- pagination ends--}}

    {{--    image starts--}}
    <div class="my-4">
        <a href="{{ route('appNotification') }}">
            <img class="cursor-pointer max-w-[82%] w-1/1 mx-auto rounded-lg"
                 src="{{asset('/storage/apppromotebg.jpg')}}" alt="music">
        </a>
    </div>
    {{--    image ends--}}

@endsection

