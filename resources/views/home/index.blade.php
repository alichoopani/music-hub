@section('title', 'HOME')
@extends('layouts.index')
@section('content')

    {{--first flex starts--}}
    <div class="flex flex-wrap">
        @foreach($randomOrder as $item)
            <div class="w-full sm:w-1/2 md:w-1/4">
                <a href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                    <img class="cursor-pointer hover:opacity-60 object-cover w-full aspect-square transition-opacity"
                        src={{asset('storage/' . $item->image)}} alt="music"></a>
                <div class="flex flex-row mt-2 mb-4 ml-4">
                    <button onclick="audio()" id="button">
                    <img class="h-10 transition hover:brightness-150 cursor-pointer hover:duration-50"
                         src="{{asset('/storage/icons/player.svg')}}" alt="_"/>
                    </button>
                    <audio id="player" preload="auto">
                        <source src={{asset('storage/' . $item->file)}} type='audio/mpeg'/>
                    </audio>
                    <div class="flex flex-row">
                        <div class="text-white ml-2 capitalize font-semibold">
                            <a href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                                <span class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">{{$item->title}}</span></a>
                            <div class="capitalize text-sm">
                                <div class="flex-row text-white cursor-default font-semibold">track by
                                    <a href="{{route('artistDetail', ['id' => $item->artist->id ."-". $item->artist->title])}}">
                                        <span class="hover:underline cursor-pointer text-[#909090]">{{$item->artist->title}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{--first flex ends--}}

    {{--featured starts--}}
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">

        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">featured</div>
            <div class="flex">
                <div class="group">
                    <button class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black
                         duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                        <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                             src="{{asset('/storage/icons/white-play.svg')}}" alt="_"/>
                        <div class="text-xs">play all</div>
                    </button>
                </div>
                <a href="{{route('browse')}}">
                    <button class="transition hover:text-[#909090] capitalize text-white text-sm font-bold px-4 py-1">see all ></button>
                </a>
            </div>
        </div>

        <div class="flex flex-wrap my-4">
            @foreach($featured as $item)
                <div class="w-1/2 md:w-1/3 lg:w-1/6 px-2">
                    <div class="w-full flex flex-col mt-2">
                        <a href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                            <img class="cursor-pointer hover:opacity-60 w-full rounded-md aspect-square object-cover"
                                src="{{asset('storage/' . $item->image)}}" alt="music">
                        </a>
                        <div class="flex flex-row mt-2">
                            <img class="h-10 transition hover:brightness-150 cursor-pointer hover:duration-50"
                                 src="{{asset('/storage/icons/player.svg')}}" alt="_"/>
                            <div class="flex flex-row">
                                <div class="text-white ml-2 capitalize font-semibold">
                                    <a href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                                        <span class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">
                                            {{$item->title}}
                                        </span>
                                    </a>
                                    <div class="capitalize text-sm text-[#909090]">
                                        <a href="{{route('artistDetail', ['id' => $item->artist->id ."-". $item->artist->title])}}">
                                            <span class="hover:underline cursor-pointer">{{$item->artist->title}}</span>
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
    {{--featured ends--}}

    {{--new tracks starts--}}
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto">
        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">new tracks</div>
            <div class="flex">
                <div class="group">
                    <button class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black
                         duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                        <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                             src="{{asset('/storage/icons/white-play.svg')}}" alt="_"/>
                        <div class="text-xs">play all</div>
                    </button>
                </div>
                <a href="{{route('latest')}}">
                    <button class="transition hover:text-[#909090] capitalize text-white text-sm font-bold px-4 py-1">see all ></button>
                </a>
            </div>
        </div>
        <div class="flex flex-wrap my-4 pb-4">
            @foreach($latestTracks as $item)
                <div class="w-1/2 md:w-1/3 lg:w-1/6 px-2">
                    <div class="w-full flex flex-col mt-2">
                        <a href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                            <img class="cursor-pointer hover:opacity-60 w-full rounded-md aspect-square object-cover"
                                src="{{asset('storage/' . $item->image)}}" alt="music">
                        </a>
                        <div class="flex flex-row mt-2">
                            <img class="h-10 transition hover:brightness-150 cursor-pointer hover:duration-50"
                                 src="{{asset('/storage/icons/player.svg')}}" alt="_"/>
                            <div class="flex flex-row">
                                <div class="text-white ml-2 capitalize font-semibold">
                                    <a href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                                        <span class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">
                                            {{$item->title}}
                                        </span>
                                    </a>
                                    <div class="capitalize text-sm text-[#909090]">
                                        <a href="{{route('artistDetail', ['id' => $item->artist->id ."-". $item->artist->title])}}">
                                            <span class="hover:underline cursor-pointer">{{$item->artist->title}}</span>
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
    {{--new tracks ends--}}

    {{--advertisement img starts--}}
    <a href="{{ route('appNotification') }}">
    <img class="cursor-pointer sm:max-w-[82%] max-w-[95%] w-1/1 mx-auto rounded-lg"
         src="{{asset('/storage/apppromotebg.jpg')}}" alt="music">
    </a>
    {{--advertisement img ends--}}

    {{--new albums starts--}}
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">
        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">new albums</div>
        <button class="transition hover:text-[#909090] capitalize text-white text-sm font-bold px-4 py-1">
            <a href="{{route('popular')}}">see all > </a></button>
        </div>

        <div class="flex flex-wrap my-4">
            @foreach($newAlbums as $item)
                <div class="w-1/2 md:w-1/4 px-2">
                    <div class="flex flex-col">
                        <a href="{{route('albumDetail', ['id' => $item->id ."-". $item->title])}}">
                            <img class="cursor-pointer hover:opacity-60 w-full rounded-md aspect-square object-cover"
                                src="{{asset('storage/' . $item->image)}}" alt="music">
                        </a>
                        <div class="text-white mx-8 my-3 capitalize font-semibold">
                           <span class="paragraph-ellipsis-2 leading-snug">
                               <a class="cursor-pointer hover:text-[#909090]"
                                  href="{{route('albumDetail', ['id' => $item->id ."-". $item->title])}}">{{$item->title}}
                               </a>
                           </span>
                            <div class="capitalize text-sm text-[#909090]">
                            <span class="cursor-default paragraph-ellipsis-2 leading-snug">{{$item->Artist->title}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{--new albums ends--}}

    {{--recently added starts--}}
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">
        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">recently added</div>
            <div class="flex">
                <div class="group">
                    <button class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black
                         duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                        <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                             src="{{asset('/storage/icons/white-play.svg')}}" alt="_"/>
                        <div class="text-xs">play all</div>
                    </button>
                </div>
                <a href="{{route('latest')}}">
                    <button class="transition hover:text-[#909090] capitalize text-white text-sm font-bold px-4 py-1">see all ></button>
                </a>
            </div>
        </div>
        <div class="flex flex-wrap my-4">
            @foreach($recentlyAdded as $item)
                <div class="w-1/2 md:w-1/3 lg:w-1/6 px-2">
                    <div class="w-full flex flex-col mt-2">
                        <a href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                            <img class="cursor-pointer hover:opacity-60 w-full rounded-md aspect-square object-cover"
                                src="{{asset('storage/' . $item->image)}}" alt="music">
                        </a>
                        <div class="flex flex-row mt-2">
                            <img class="h-10 transition hover:brightness-150 cursor-pointer hover:duration-50"
                                 src="{{asset('/storage/icons/player.svg')}}" alt="_"/>
                            <div class="flex flex-row">
                                <div class="text-white ml-2 capitalize font-semibold">
                                    <a href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                                        <span class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">
                                            {{$item->title}}</span>
                                    </a>
                                    <div class="capitalize text-sm text-[#909090]">
                                        <a href="{{route('artistDetail', ['id' => $item->artist->id ."-". $item->artist->title])}}">
                                            <span class="hover:underline cursor-pointer">{{$item->artist->title}}</span>
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
    {{--recently added ends--}}

    {{--best of month starts--}}
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">
        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">best of month</div>
            <div class="flex">
                <div class="group">
                    <button class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black
                         duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                        <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                             src="{{asset('/storage/icons/white-play.svg')}}" alt="_"/>
                        <div class="text-xs">play all</div>
                    </button>
                </div>
                    <button class="transition hover:text-[#909090] capitalize text-white text-sm font-bold px-4 py-1">
                        <a href="{{route('popular')}}">see all > </a></button>
            </div>
        </div>
        <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3 my-4">
            @foreach($bestOfTheMonth as $item)
                <div class="bg-[#303030] flex rounded-md">
                    <a class="w-1/2" href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">
                        <img class="h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0 hover:opacity-60"
                            src="{{asset('storage/' . $item->image)}}" alt="music">
                    </a>
                    <div class="w-full flex flex-col justify-center text-white capitalize py-3 text-base font-semibold min-h-[6rem]">
                        <span class="paragraph-ellipsis-2 leading-snug ml-2">
                            <a class="cursor-pointer hover:text-[#909090]"
                                href="{{route('trackDetail', ['id' => $item->id ."-". $item->title])}}">{{$item->title}}
                            </a>
                        </span>
                        <div class=" capitalize text-sm text-[#989896] font-semibold">
                           <span class="paragraph-ellipsis-2 leading-snug ml-2">
                               <a class="hover:underline"
                                  href="{{route('artistDetail', ['id' => $item->artist->id ."-". $item->artist->title])}}">
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
    {{--best of month ends--}}

    {{--top categories starts--}}
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">
        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">categories</div>
            <div class="flex">
                <a href="{{route('category')}}">
                    <button class="transition hover:text-[#909090] capitalize text-white text-sm font-bold px-4 py-1">see all ></button>
                </a>
            </div>
        </div>
        <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3 my-4">
            @foreach($categories as $item)
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
    {{--top categories ends--}}

    {{--top artists starts--}}
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">
        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">top artists</div>
            <div class="flex">
                <button class="transition hover:text-[#909090] capitalize text-white text-sm font-bold px-4 py-1">
                    <a href="{{ route('artist') }}">see all > </a></button>
            </div>
        </div>
        <div class="w-full grid gap-4 md:grid-cols-2 md:grid-rows-4 lg:grid-cols-3 lg:grid-rows-4 my-4">
            @foreach($topArtists as $item)
                <div class="bg-[#303030] flex rounded-md">
                    <a class="w-1/2" href="{{route('artistDetail', ['id' => $item->id ."-". $item->title])}}">
                        <img class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                            src="{{asset('storage/' . $item->image)}}" alt="music"></a>
                    <div class="w-full flex flex-col justify-center text-white capitalize pr-4 py-3 text-base font-semibold min-h-[6rem]">
                       <span class="paragraph-ellipsis-2 leading-snug my-1">
                           <a class="hover:text-[#909090] cursor-pointer"
                               href="{{route('artistDetail', ['id' => $item->id ."-". $item->title])}}">{{$item->title}}</a>
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
    <script type="text/javascript">
        window.audio = function () {
            var player = document.getElementById("player");

            var isPlaying = false;

            player.onplaying = function () {
                isPlaying = true;
            };
            player.onpause = function () {
                isPlaying = false;
            };
        }

        var event = document.getElementById("player");

        button.addEventListener("click", function () {
            if (event.paused) {
                event.play();
                document.getElementById("imgClickAndChange").src = "{{ asset('/storage/icons/pause.svg') }}";
            } else {
                event.pause();
                document.getElementById("imgClickAndChange").src = "{{ asset('/storage/icons/white-play.svg') }}";
            }
        });
    </script>
@endsection

