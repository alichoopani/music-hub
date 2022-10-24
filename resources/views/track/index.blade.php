@section('title', 'Tracks')
@extends('layouts.index')
@section('content')

    {{--first session starts--}}
    <div class="max-w-[81%] mx-auto my-4">
        <div class="w-full">
            <div class="bg-[#303030] md:flex grid rounded-md w-full h-[49rem] sm:h-[56rem] md:h-[24rem] lg:h-72">
                <img
                    class="cursor-default w-full md:w-72 rounded-t-md md:rounded-l-md md:rounded-tr-none aspect-square object-cover flex-shrink-0"
                    src={{asset('storage/' . $track->image)}}
                        alt="music">
                <div class="flex flex-col w-full font-semibold">
                    <div class="flex flex-row gap-6 text-[#989898]  py-6 px-8 h-10 text-sm max-w-[40%]">
                        <div class="flex-1 whitespace-nowrap">
                            <div class="flex gap-1">
                                <img class="h-3 my-1" src="{{asset('/storage/icons/calender.svg')}}" alt="_"/>
                                <div class="capitalize cursor-default">{{$track->publish->format('d/m/Y')}}</div>
                            </div>
                        </div>
                        <div class="flex-1 whitespace-nowrap">
                            <div class="flex gap-1">
                                <img class="h-3 my-1" src="{{asset('/storage/icons/play.svg')}}" alt="_"/>
                                <div class="capitalize cursor-default">205.9k plays</div>
                            </div>
                        </div>
                        <div class="flex-1 whitespace-nowrap">
                            <div class="flex gap-1">
                                <img class="h-3 my-1" src="{{asset('/storage/icons/like.svg')}}" alt="_"/>
                                <div class="capitalize cursor-default">1.2k likes</div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col my-4 mx-8">
                        <div
                            class="text-xl sm:text-2xl md:text-3xl font-extrabold text-white capitalize cursor-default">{{$track->title}}
                        </div>
                        <div
                            class="capitalize text-[#989898] text-sm font-bold cursor-default">{{$track->artist->title}}</div>
                    </div>
                    <div class="flex flex-wrap gap-1 mx-6 my-2">
                        <div class="group">
                            <button onclick="audio();myFunction(this)" id="button"
                                    class="fa fa-thumbs-up text-bold text-xs flex flex-row px-4 sm:px-6 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white px-8 py-2 text-white font-semibold text-sm">
                                <div class="flex flex-row">
                                    <img id="play-icon" class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300" src="{{ asset('/storage/icons/white-play.svg') }}" alt="_"/>
                                    <div class="text-xs text-bold">Play now</div>
                                </div>
                            </button>
                            <audio id="player" preload="auto">
                                src="{{asset('/storage/icons/white-play.svg')}}"
                                <source src={{asset('storage/' . $track->file)}} type='audio/mpeg'/>
                            </audio>

                        </div>
                        <div class="group">
                            <a href="/app-notification">
                                <button
                                    class="flex flex-row px-4 sm:px-6 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white px-8 py-2 text-white font-semibold text-sm">
                                    <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                         src="{{asset('/storage/icons/bookmark.svg')}}" alt="_"/>
                                    <div class="text-xs text-bold">bookmark</div>
                                </button>
                            </a>
                        </div>
                        <div class="group">
                            <a href="/app-notification">
                                <button
                                    class="flex flex-row px-4 sm:px-6 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white px-8 py-2 text-white font-semibold text-sm">
                                    <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                         src="{{asset('/storage/icons/fillLike.svg')}}" alt="_"/>
                                    <div class="text-xs text-bold">like</div>
                                </button>
                            </a>
                        </div>
                        <div class="group">
                            <a href="/app-notification">
                                <button
                                    class="flex flex-row px-4 sm:px-6 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white px-8 py-2 text-white font-semibold text-sm">
                                    <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                         src="{{asset('/storage/icons/download.svg')}}" alt="_"/>
                                    <div class="text-xs text-bold">download</div>
                                </button>
                            </a>
                        </div>
                        <div class="group">
                            <a href="/app-notification">
                                <button
                                    class="flex flex-row px-4 sm:px-6 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white px-8 py-2 text-white font-semibold text-sm">
                                    <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                         src="{{asset('/storage/icons/share.svg')}}" alt="_"/>
                                    <div class="text-xs text-bold">share</div>
                                </button>
                            </a>
                        </div>
                        <div class="group">
                            <a href="/app-notification">
                                <button
                                    class="flex flex-row px-4 sm:px-6 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white px-8 py-2 text-white font-semibold text-sm">
                                    <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                         src="{{asset('/storage/icons/tablet.svg')}}" alt="_"/>
                                    <div class="text-xs text-bold">open in app</div>
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="flex flex-row mx-6 my-2 w-60">
                        <div class="capitalize text-[#989898] text-sm font-bold cursor-default">track artist:</div>
                        <a href="{{route('artist', ['id' => $track->artist->id])}}">
                            <div
                                class="capitalize text-white text-sm font-bold cursor-pointer">{{""}}{{$track->artist->title}}</div>
                        </a>
                    </div>
                    <div class="text-[#6E6E6C] mx-6 text-xs font-bold cursor-pointer"><a href="/app-notification">Easy listening
                            to {{$track->artist->title}}songs by Musichub app. click here to install.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-[50%] text-center mx-auto text-white mt-8 text-sm font-semibold cursor-default">
        <p class="truncate">{!! nl2br(e($track->text))!!}</p>
    </div>
    {{--    top related starts--}}
    <div class="max-w-[82%] mx-auto py-6">
        <div class="flex items-center justify-center">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold px-2 cursor-default">top related
            </div>
            <div class="flex ml-auto">
                <div class="group">
                    <button class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black
                    duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                        <img class="h-3 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                             src="{{asset('/storage/icons/white-play.svg')}}" alt="_"/>
                        <div class="text-xs text-bold">play all</div>
                    </button>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap my-4">
            @foreach($topRelated as $item)
                <div class="w-1/2 md:w-1/3 lg:w-1/6 px-2">
                    <div class="w-full flex flex-col mt-2">
                        <a href="{{route('track', ['id' => $item->id])}}">
                            <img class="cursor-pointer hover:opacity-60 w-full rounded-md aspect-square object-cover"
                                src="{{asset('storage/' . $item->image)}}" alt="music"></a>
                        <div class="flex flex-row mt-2">
                            <img class="h-10 transition hover:brightness-150 cursor-pointer hover:duration-50"
                                 src="{{asset('/storage/icons/player.svg')}}" alt="_"/>
                            <div class="flex flex-row">
                                <div class="text-white ml-2 capitalize font-semibold">
                                    <a href="{{route('track', ['id' => $item->id])}}"><span
                                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">{{$item->title}}</span></a>
                                    <div class="capitalize text-sm text-[#909090]">
                                        <a href="{{route('artist', ['id' => $item->artist->id])}}"><span
                                                class="hover:underline cursor-pointer">{{$item->artist->title}}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{--top related ends--}}

    {{--more related starts--}}
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">
        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">
                more related
            </div>
            <div class="flex">
                <div class="group">
                    <button
                        class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                        <img class="h-3 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                             src="{{asset('/storage/icons/white-play.svg')}}" alt="_"/>
                        <div class="text-xs text-bold">play all</div>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3 my-4">
            @foreach($moreRelated as $item)
                <div class="bg-[#303030] flex rounded-md">
                    <a class="w-1/2" href="{{route('track', ['id' => $item->id])}}"><img
                            class="h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0 hover:opacity-60"
                            src="{{asset('storage/' . $item->image)}}"
                            alt="music"></a>
                    <div
                        class="w-full flex flex-col justify-center text-white capitalize py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="paragraph-ellipsis-2 leading-snug ml-2"><a
                                class="cursor-pointer hover:text-[#909090]"
                                href="{{route('track', ['id' => $item->id])}}">{{$item->title}}</a></span>
                        <div class=" capitalize text-sm text-[#989896] font-semibold">
                           <span
                               class="paragraph-ellipsis-2 leading-snug ml-2"> <a class="hover:underline"
                                                                                  href="{{route('artist', ['id' => $item->artist->id])}}">{{$item->artist->title}}</a></span>
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
    {{--    more related ends--}}

    <div class="flex justify-center">
        {{ $moreRelated->links('pagination::tailwind') }}
    </div>

    <div class="my-4">
        <img class="cursor-pointer max-w-[82%] w-1/1 mx-auto rounded-lg" src="{{asset('/storage/apppromotebg.jpg')}}"
             alt="music">
    </div>
    <script>
        function audio() {
            var player = document.getElementById("player");
            var isPlaying = false;

            function togglePlay() {
                isPlaying ? player.pause() : player.play();
            }

            player.onplaying = function () {
                isPlaying = true;
            };
            player.onpause = function () {
                isPlaying = false;
            };
        }

        var audio = document.getElementById("player");

        button.addEventListener("click", function () {
            if (audio.paused) {
                audio.play();
                button.innerHTML = "Pause";
                audio.className = "fa fa-play";
            } else {
                audio.pause();
                button.innerHTML = "Play";
                audio.className = "fa fa-pause";
            }
        });

        function myFunction(x) {
            x.classList.toggle("fa-thumbs-down");
        }
    </script>
@endsection
