@section('title', 'Albums')
@extends('layouts.index')
@section('content')
{{--first flex starts--}}
<div class="max-w-[81%] mx-auto">
    <div class="flex flex-wrap">
        @foreach($albums as $item)
        <div class="w-full sm:w-1/2 md:w-1/4 text-center">
            <a href="{{ route('albumDetail', ['id' => $item->id ."-". $item->title]) }}">
                <img class="cursor-pointer hover:opacity-60 object-cover w-full aspect-square transition-opacity"
                     src="{{asset('storage/' . $item->image)}}" alt="music"></a>
            <div class="mx-4 sm:mx-6 lg:mx-10 my-3 font-semibold text-white">
                    <span class="paragraph-ellipsis-2 leading-snug py-1">
                        <a class="hover:text-[#909090] cursor-pointer" href="{{ route('albumDetail', ['id' => $item->id ."-". $item->title]) }}">{{ $item->title }}</a>
                    </span>
                <div class="flex justify-center">
                    <div class="pl-1 text-[#909090] font-semibold text-sm">
                       <span class="cursor-default paragraph-ellipsis-2 leading-snug font-bold text-center">{{ $item->artist->title }}</span>
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
        <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">more albums</div>
    </div>
    <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3 mt-4">
        @foreach($randomAlbums as $item)
        <div class="bg-[#303030] flex rounded-md">
            <a class="w-1/2" href="{{ route('albumDetail', ['id' => $item->id ."-". $item->title]) }}">
                <img class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('storage/' . $item->image)}}" alt="music"></a>
            <div class="w-full flex flex-col justify-center text-white capitalize pr-4 py-3 text-base font-semibold min-h-[6rem]">
                   <span class="paragraph-ellipsis-2 leading-snug my-1">
                       <a class="hover:text-[#909090] cursor-pointer"
                           href="{{ route('albumDetail', ['id' => $item->id ."-". $item->title]) }}">{{ $item->title }}</a>
                   </span>
                <div class="flex">
                    <div class="pl-1 text-[#909090] font-semibold text-sm">
                       <span class="cursor-default paragraph-ellipsis-2 leading-snug font-bold text-center">{{ $item->artist->title }}</span>
                    </div>
                </div>
            </div>
            <div class="flex-col font-bold my-auto pr-5 text-[#909090] cursor-default text-xl"> ></div>
        </div>
        @endforeach
    </div>
</div>
{{--popular artists ends--}}
<div class="flex justify-center">
    {{ $randomAlbums->links('pagination::tailwind') }}
</div>

{{-- pagination ends--}}
<div class="my-4">
    <img class="cursor-pointer max-w-[82%] w-1/1 mx-auto rounded-lg" src="{{asset('/storage/apppromotebg.jpg')}}" alt="music">
</div>
@endsection
