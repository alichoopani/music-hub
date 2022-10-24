@section('title', 'Categories')
@extends('layouts.index')
@section('content')
    {{--first flex starts--}}
    <div class="max-w-[81%] mx-auto">
        <div class="flex flex-wrap">
            @foreach($categories as $item)
                <div class="w-full sm:w-1/2 md:w-1/4 text-center">
                    <a href="{{route('categoryDetail', ['id' => $item->id ."-". $item->title])}}">
                        <img class="cursor-pointer hover:opacity-60 object-cover w-full aspect-square transition-opacity"
                            src={{asset('storage/' . $item->image)}} >
                    </a>
                    <div class="mx-4 sm:mx-6 lg:mx-10 my-3 font-semibold text-white">
                        <span class="paragraph-ellipsis-2 leading-snug py-1">
                            <a class="hover:text-[#909090] cursor-pointer"
                               href="{{route('categoryDetail', ['id' => $item->id ."-". $item->title])}}">{{$item->title}}</a>
                        </span>
                        <div class="flex justify-center">
                            <div class="pl-1 text-[#909090] font-semibold text-sm"></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{--first flex ends--}}

    {{--exclusive categories starts--}}
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">
        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">exclusive categories</div>
            <div class="flex">
                <div class="group"></div>
            </div>
            <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3 my-4">
                @foreach($popularCategories as $item)
                    <div class="bg-[#303030] flex rounded-md">
                        <a class="w-1/2" href="{{route('categoryDetail', ['id' => $item->id ."-". $item->title])}}">
                            <img class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                                src="{{asset('storage/' . $item->image)}}" alt="music">
                        </a>
                        <div class="w-full flex flex-col justify-center text-white capitalize pr-4 py-3 text-base font-semibold min-h-[6rem]">
                       <span class="paragraph-ellipsis-2 leading-snug my-1">
                           <a class="hover:text-[#909090] cursor-pointer"
                               href="{{route('categoryDetail', ['id' => $item->id ."-". $item->title])}}">{{$item->title}}</a>
                       </span>
                            <div class="flex">
                                <img class="h-4" src="{{asset('/storage/icons/user.svg')}}" alt="_"/>
                                <div class="pl-1 text-[#909090] font-semibold text-sm">
                           <span class="cursor-default paragraph-ellipsis-2 leading-snug font-bold text-center">{{ $item->follows->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex-col font-bold my-auto pr-5 text-[#909090] cursor-default text-lg"> ></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--best of month ends--}}

    {{--pagination starts--}}
    <div class="flex justify-center mb-2">
        {{ $popularCategories->links('pagination::tailwind') }}
    </div>
    {{-- pagination ends--}}

    {{--advertisement img starts--}}
    <img class="cursor-pointer sm:max-w-[82%] max-w-[95%] w-1/1 mx-auto rounded-lg mb-8" src="{{asset('/storage/apppromotebg.jpg')}}" alt="music">
    {{--advertisement img ends--}}
@endsection
