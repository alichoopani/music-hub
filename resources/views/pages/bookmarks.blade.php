@section('title', 'Bookmarks')
@extends('layouts.index')
@section('content')
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-4">
        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">bookmarks</div>
        </div>
        <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3 my-4">
            @foreach($bookmarks as $item)
                <div class="bg-[#303030] flex rounded-md">
                    <a class="w-1/2" href="{{ route( $item->bookmarkable_type == 'App\Models\Track' ? 'trackDetail' : 'albumDetail', ['id' => $item->bookmarkable->id . '-' . $item->bookmarkable->title])}}">
                        <img class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                             src="{{asset('storage/' . $item->bookmarkable->image)}}" alt="music"></a>
                    <div class="w-full flex flex-col justify-center text-white capitalize pr-4 py-3 text-base font-semibold min-h-[6rem]">
                       <span class="paragraph-ellipsis-2 leading-snug my-1">
                           <a class="hover:text-[#909090] cursor-pointer"
                              href="{{ route( $item->bookmarkable_type == 'App\Models\Track' ? 'trackDetail' : 'albumDetail', ['id' => $item->bookmarkable->id . '-' . $item->bookmarkable->title])}}">
                               {{$item->bookmarkable->title}}
                           </a>
                       </span>
                        <div class="flex">
                            <div class="pl-1 text-[#909090] font-semibold text-sm">
                                <span class="cursor-default paragraph-ellipsis-2 leading-snug font-bold text-center">{{$item->bookmarkable->artist->title}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex-col font-bold my-auto pr-5 text-[#909090] cursor-default text-xl"> ></div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex justify-center mb-5">
        {{ $bookmarks->links('pagination::tailwind') }}
    </div>
@endsection
