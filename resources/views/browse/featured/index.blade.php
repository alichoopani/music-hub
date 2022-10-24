@section('title', 'Featured')
@extends('layouts.index')
@section('content')
    {{--    second navbar starts--}}
    <x-browse-headbar></x-browse-headbar>
    {{--    second navbar ends--}}

    {{--featured starts--}}
    @if($featured->count())
        <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6 mt-44 md:mt-0">
            <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
                <div
                    class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">
                    featured
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
                </div>
            </div>
            <div class="w-full grid gap-4 md:grid-cols-2 md:grid-rows-4 lg:grid-cols-3 lg:grid-rows-4 mt-4">
                @foreach($featured as $item)
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
                                   {{$item->artist->title}}
                               </a>
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
    {{--featured ends--}}

    {{--pagination starts--}}
    <div class="flex justify-center">
        {{ $featured->links('pagination::tailwind') }}
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
