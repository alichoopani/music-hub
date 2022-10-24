@section('title', 'Profile')
@extends('layouts.index')
@section('content')
    <div class="max-w-[51%] mx-auto mb-8">
        <div class="w-full flex flex-col relative">
            <img class="object-cover rounded-lg rounded-b-lg w-full h-full absolute top-0 left-0 object-cover z-0"
                 src="{{ asset('storage/' . $profile->avatar) }}" alt="_"/>
            <div
                class="w-full h-[20rem] flex flex-col items-center justify-end text-center gap-2 pt-20 pb-8 z-20 bg-gradient-to-t from-[#202020]">
                <span class="text-3xl font-extrabold text-white cursor-default">{{ $profile->username }}</span>
                <div
                    class="flex flex-row text-[#91968E] font-bold text-sm mb-4 cursor-default">{{ $profile->email }}</div>
                <div class=" flex flex-col sm:flex-row flex-shrink-0 gap-2 mb-3">
                    <div class="group">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="flex flex-row px-4 sm:px-6 transition group-hover:bg-white group-hover:text-black
                            duration-300 rounded-full capitalize border border-white px-8 py-2 text-white font-semibold text-sm"
                                    onclick="event.preventDefault();this.closest('form').submit();">
                                <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                     src="{{asset('/storage/icons/logout.svg')}}" alt="_"/>
                                <div class="text-xs text-bold">{{ __('Log Out') }}</div>
                            </button>
                        </form>
                    </div>
                    <a href="{{ route('edit') }}">
                        <div class="group">
                            <button class="flex flex-row px-4 sm:px-6 transition group-hover:bg-white group-hover:text-black
                            duration-300 rounded-full capitalize border border-white px-8 py-2 text-white font-semibold text-sm">
                                <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                     src="{{asset('/storage/icons/editProfile2.svg')}}" alt="_"/>
                                <div class="text-xs text-bold"> {{ __('EDIT PROFILE') }}</div>
                            </button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{--    likes musics starts--}}
    @if($likes->count())
        <div class="max-w-[82%] mx-auto">
            <div class="flex">
                <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">likes</div>
                <div class="flex ml-auto">
                    <a href="{{route('likes')}}">
                        <button class="transition hover:text-[#909090] capitalize text-white text-sm font-bold px-4 py-1">see all ></button>
                    </a>
                </div>
            </div>
            <div class="flex flex-wrap my-4">
                @foreach($likes as $item)
                    <div class="w-1/2 md:w-1/3 lg:w-1/6 px-2">
                        <div class="w-full flex flex-col mt-2">
                            <a href="{{ route( $item->likeable_type == 'App\Models\Track' ? 'trackDetail' : 'albumDetail', ['id' => $item->likeable->id . '-' . $item->likeable->title]) }}">
                                <div class="relative">
                                    <img class="cursor-pointer hover:opacity-60 w-full rounded-md aspect-square object-cover"
                                        src="{{asset('storage/' . $item->likeable->image)}}" alt="music" />
                                </div>
                            </a>
                            <div class="absolute bottom-0 right-0">
                                @livewire('like2', ['itemId' => $item->likeable->id, 'type' => 'track'])
                            </div>
                        </div>
                        <div class="flex flex-row mt-2">
                            <img class="h-10 transition hover:brightness-150 cursor-pointer hover:duration-50"
                                 src="{{asset('/storage/icons/player.svg')}}" alt="_"/>
                            <div class="flex flex-row">
                                <div class="text-white ml-2 capitalize font-semibold">
                                    <a class="cursor-pointer hover:text-[#909090]"
                                       href="{{ route( $item->likeable_type == 'App\Models\Track' ? 'trackDetail' : 'albumDetail', ['id' => $item->likeable->id . '-' . $item->likeable->title]) }}">
                                        {{ $item->likeable->title }}</a>
                                    <div class="capitalize text-sm text-[#909090]">
                                        <a class="hover:underline"
                                           href="{{ route('artistDetail', ['id' => $item->likeable->artist->id ."-". $item->likeable->artist->title]) }}"> {{ $item->likeable->artist->title }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
        @endif
        </div>

        {{--    likes musics ends--}}


        {{--    bookmarked musics starts--}}
        @if($bookmarks->count())
            <div class="max-w-[82%] mx-auto">
                <div class="flex">
                    <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">Bookmarked</div>
                    <div class="flex ml-auto">
                        <a href="{{ route('bookmark') }}">
                            <button class="transition hover:text-[#909090] capitalize text-white text-sm font-bold px-4 py-1">see all ></button>
                        </a>
                    </div>
                </div>

                <div class="flex flex-wrap my-4">
                    @foreach($bookmarks as $item)
                        <div class="w-1/2 md:w-1/3 lg:w-1/6 px-2">
                            <div class="w-full flex flex-col mt-2">
                                <a href="{{ route( $item->bookmarkable_type == 'App\Models\Track' ? 'trackDetail' : 'albumDetail', ['id' => $item->bookmarkable->id . '-' . $item->bookmarkable->title]) }}">
                                    <div class="relative">
                                        <img class="cursor-pointer hover:opacity-60 w-full rounded-md aspect-square object-cover"
                                            src="{{asset('storage/' . $item->bookmarkable->image)}}" alt="music">
                                </a>
                                <div class="absolute bottom-0 right-0">
                                    @livewire('bookmark2', ['itemId' => $item->bookmarkable->id, 'type' => 'track'])
                                </div>
                            </div>
                            <div class="flex flex-row mt-2">
                                <img class="h-10 transition hover:brightness-150 cursor-pointer hover:duration-50"
                                    src="{{asset('/storage/icons/player.svg')}}" alt="_"/>
                                <div class="flex flex-row">
                                    <div class="text-white ml-2 capitalize font-semibold">
                                        <a class="cursor-pointer hover:text-[#909090]"
                                           href="{{ route( $item->bookmarkable_type == 'App\Models\Track' ? 'trackDetail' : 'albumDetail', ['id' => $item->bookmarkable->id . '-' . $item->bookmarkable->title]) }}">
                                            {{ $item->bookmarkable->title }}</a>
                                        <div class="capitalize text-sm text-[#909090]">
                                            <a class="hover:underline"
                                               href="{{ route('artistDetail', ['id' => $item->bookmarkable->artist->id ."-". $item->bookmarkable->artist->title]) }}"> {{ $item->bookmarkable->artist->title }} </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
{{--    bookmarked musics ends--}}

{{--    followed starts--}}
            @if($followedArtists->count())
                <div class="max-w-[82%] mx-auto">
                    <div class="flex">
                        <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">Followed Artists
                        </div>
                        <div class="flex ml-auto">
                            <a href="{{ route('followArtists') }}">
                                <button class="transition hover:text-[#909090] capitalize text-white text-sm font-bold px-4 py-1">see all ></button>
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-wrap my-4">
                        @foreach($followedArtists as $item)
                            @if($item->followable_type == 'App\\Models\\Artist')
                                <div class="w-1/2 md:w-1/3 lg:w-1/6 px-2">
                                    <div class="w-full flex flex-col mt-2">
                                        <a href="{{ route('artistDetail', ['id' => $item->followable->id . '-' . $item->followable->title]) }}">
                                            <div class="relative">
                                                <img class="cursor-pointer hover:opacity-60 w-full rounded-md aspect-square object-cover"
                                                    src="{{asset('storage/' . $item->followable->image)}}" alt="music">
                                        </a>
                                        <div class="absolute bottom-0 right-0">
                                            @livewire('follow2', ['itemId' => $item->followable->id, 'type' => 'artist'])
                                        </div>
                                    </div>
                                    <div class="flex flex-row mt-2">
                                        <div class="flex flex-row">
                                            <div class="text-white ml-2 capitalize font-semibold">
                                                <a class="cursor-pointer hover:text-[#909090]"
                                                   href="{{ route('artistDetail', ['id' => $item->followable->id . '-' . $item->followable->title]) }}">
                                                    {{ $item->followable->title }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            @endif
        </div>


        @if($followedCategories->count())
            <div class="max-w-[82%] mx-auto">
                <div class="flex">
                    <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">Followed Categories
                    </div>
                    <div class="flex ml-auto">
                        <a href="{{ route('followCategories') }}">
                            <button
                                class="transition hover:text-[#909090] capitalize text-white text-sm font-bold px-4 py-1">see all ></button>
                        </a>
                    </div>
                </div>

                <div class="flex flex-wrap my-4">
                    @foreach($followedCategories as $item)
                        @if($item->followable_type == 'App\\Models\\Category')
                            <div class="w-1/2 md:w-1/3 lg:w-1/6 px-2">
                                <div class="w-full flex flex-col mt-2">
                                    <a href="{{ route( 'categoryDetail', ['id' => $item->followable->id . '-' . $item->followable->title]) }}">
                                        <div class="relative">
                                            <img class="cursor-pointer hover:opacity-60 w-full rounded-md aspect-square object-cover"
                                                src="{{asset('storage/' . $item->followable->image)}}" alt="music">
                                    </a>
                                    <div class="absolute bottom-0 right-0">
                                        @livewire('follow2', ['itemId' => $item->followable->id, 'type' => 'categories'])
                                    </div>
                                </div>
                                <div class="flex flex-row mt-2">
                                    <div class="flex flex-row">
                                        <div class="text-white ml-2 capitalize font-semibold">
                                            <a class="cursor-pointer hover:text-[#909090]"
                                               href="{{ route( 'categoryDetail', ['id' => $item->followable->id . '-' . $item->followable->title]) }}">
                                                {{ $item->followable->title }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                @endif
            </div>
{{--    bookmarked musics ends--}}

@endsection
