@section('title', 'Track Detail')
@extends('layouts.index')
@section('content')
    {{--first session starts--}}
    <div class="max-w-[81%] mx-auto my-4">
        <div class="w-full">
            <div class="bg-[#303030] md:flex grid rounded-md w-full h-[49rem] sm:h-[56rem] md:h-[24rem] lg:h-72">
                <img
                    class="w-full md:w-72 rounded-t-md md:rounded-l-md md:rounded-tr-none aspect-square object-cover flex-shrink-0"
                    src={{asset('storage/' . $track->image)}} alt="music">
                <div class="flex flex-col w-full font-semibold">
                    <div class="flex flex-row gap-10 text-[#989898]  py-6 px-8 h-10 text-sm max-w-[40%]">
                        <div class="flex-1 whitespace-nowrap">
                            <div class="flex gap-1">
                                <img class="h-3 my-1" src="{{asset('/storage/icons/calender.svg')}}" alt="_"/>
                                <div class="capitalize cursor-default">{{$track->publish->format('d/m/Y')}}</div>
                            </div>
                        </div>
                        <div class="flex-1 whitespace-nowrap">
                            <div class="flex gap-1">
                                <img class="h-3 my-1" src="{{asset('/storage/icons/play.svg')}}" alt="_"/>
                                <div class="capitalize cursor-default">{{ $track->plays }} Plays</div>
                            </div>
                        </div>
                        <div class="flex-1 whitespace-nowrap">
                            <div class="flex gap-1">
                                <img class="h-3 my-1" src="{{asset('/storage/icons/gray-like.svg')}}" alt="_"/>
                                <div class="capitalize cursor-default">{{ $countLikes }} likes</div>
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
                    <div class="flex flex-wrap gap-2 mx-6 my-2">
                        <div class="group">
                            <button onclick="audio()" id="button"
                                    class="text-bold text-xs flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                                <div class="flex flex-row">
                                    <img id="imgClickAndChange"
                                         class="h-4 mr-1 transition group-hover:brightness-0 group-hover:duration-300"
                                         src="{{asset('/storage/icons/white-play.svg')}}" alt="_"/>
                                    <div id="textPlayer" class="text-xs text-bold">Play now</div>
                                </div>
                            </button>
                            <audio id="player" preload="auto">
                                src="{{asset('/storage/icons/white-play.svg')}}"
                                <source src={{asset('storage/' . $track->file)}} type='audio/mpeg'/>
                            </audio>
                        </div>
                        <div>
                            @livewire('bookmark', ['itemId' => $track->id, 'type' => 'track'])
                        </div>
                        <div>
                            @livewire('like', ['itemId' => $track->id, 'type' => 'track'])
                        </div>

                        <div class="group">
                            <button
                                class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white px-8 py-2 text-white font-semibold text-sm">
                                <img class="h-4 mr-1 transition group-hover:brightness-0 group-hover:duration-300"
                                     src="{{asset('/storage/icons/download.svg')}}" alt="_"/>
                                <div class="text-xs text-bold"><a
                                        href="{{ route('trackDetail', ['id' => $track->id ."-". $track->title]) }}"
                                        download="{{ 'storage/' . $track->file }}">download</a></div>
                            </button>
                        </div>
                        <div class="group">
                            <button
                                class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white px-8 py-2 text-white font-semibold text-sm"
                                type="button" data-modal-toggle="trackShare">
                                <img class="h-4 mr-1 transition group-hover:brightness-0 group-hover:duration-300"
                                     src="{{asset('/storage/icons/share.svg')}}" alt="_"/>
                                <div class="text-xs text-bold">share</div>
                            </button>
                        </div>
                        <div id="trackShare" tabindex="-1" aria-hidden="true"
                             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                            <div class="max-w-[73%] sm:max-w-[66%] md:max-w-[51%] lg:max-w-[36%] mx-auto my-6">
                                <div class="w-full">
                                    <div
                                        class="grid rounded-md w-full h-[18rem] sm:h-[21rem] bg-gradient-to-r from-[#F9355D] to-[#C128EF]">
                                        <div class="grid grid-cols-4 lg:gap-2">
                                            <div class="col-span-3 pl-4">
                                                <img
                                                    class="cursor-default object-cover mx-auto rounded-lg max-h-[13rem] sm:max-h-[16rem] w-full mt-3"
                                                    src="{{asset('/storage' . $track->image)}}" alt="music">
                                            </div>
                                            <div
                                                class="col-span-1 text-5xl sm:text-6xl text-white font-bold cursor-default my-3 mx-auto">
                                                {!!Share::page('https://readerstacks.com', 'Share title',["target"=>"_blank"])
                                                    ->facebook()
                                                    ->twitter()
                                                    ->linkedin('Extra linkedin summary can be passed here')
                                                    ->whatsapp();
                                                !!}
                                            </div>
                                        </div>
                                        <div class="flex flex-wrap gap-1 sm:gap-2 mx-auto my-2">
                                            <div class="group">
                                                <button data-modal-toggle="trackShare" type="button" class="flex flex-row px-5 transition group-hover:bg-white group-hover:text-black
                                duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                                                    <div class="text-xs font-bold">close</div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <button
                                class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white px-8 py-2 text-white font-semibold text-sm"
                                type="button" data-modal-toggle="appNotification">
                                <img class="h-4 mr-1 transition group-hover:brightness-0 group-hover:duration-300"
                                     src="{{asset('/storage/icons/tablet.svg')}}" alt="_"/>
                                <div class="text-xs text-bold">open in app</div>
                            </button>
                        </div>
                        <div id="appNotification" tabindex="-1" aria-hidden="true"
                             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                            <div class="max-w-[59%] mx-auto my-12 sm:max-w-[41%]">
                                <div class="w-full">
                                    <div
                                        class="grid rounded-md w-full h-[21rem] bg-gradient-to-r from-[#F9355D] to-[#C128EF]">
                                        <img class="cursor-default w-1/1 mx-auto rounded-t-lg"
                                             src="{{asset('/storage/apppromotebg.jpg')}}" alt="music">
                                        <div class="flex flex-col w-full font-semibold pb-10">
                                            <div class="flex flex-col my-2 mx-8">
                                                <div class="text-sm text-white font-bold cursor-default">
                                                    To like your favorite songs, you need to install
                                                    the MrTehran app. The MrTehran app includes a variety of features
                                                    that you will enjoy. Click
                                                    the button and install the app on your phone.
                                                </div>
                                            </div>
                                            <div class="flex flex-wrap gap-1 sm:gap-2 mx-auto my-2">
                                                <div class="group">
                                                    <button
                                                        class="flex flex-row px-4 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                                                        <img
                                                            class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                                            src="{{asset('/storage/icons/tablet.svg')}}" alt="_"/>
                                                        <div class="text-xs font-bold">install app</div>
                                                    </button>
                                                </div>
                                                <div class="group">
                                                    <button data-modal-toggle="appNotification" type="button"
                                                            class="flex flex-row px-4 sm:px-6 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                                                        <div class="text-xs font-bold">close</div>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row mx-6 my-2 w-60">
                        <div class="capitalize text-[#989898] text-sm font-bold cursor-default">track artist :</div>
                        <div class="capitalize text-white text-sm font-bold cursor-pointer">
                            <a href="{{route('artistDetail', ['id' => $track->artist->id ."-". $track->artist->title])}}">{{$track->artist->title}}
                        </div>
                        </a>
                    </div>
                    <div class="text-[#6E6E6C] mx-6 text-xs font-bold cursor-pointer">
                        Easy listening
                        to{{$track->artist->title}}
                        songs by Musichub app. click here to install.
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--album tracks starts--}}
    @if($albumTracks->count())
        <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">
            <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
                <div
                    class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">
                    album tracks
                </div>
                <div class="flex">
                    <div class="group">
                        <button
                            class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                            <img class="h-4 mr-1 transition group-hover:brightness-0 group-hover:duration-300"
                                 src="{{asset('/storage/icons/white-play.svg')}}" alt="_"/>
                            <div class="text-xs text-bold">play all</div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3 my-4">
                @foreach($albumTracks as $item)
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
                                      href="{{route('artistDetail', ['id' => $item->artist->id ."-". $item->artist->title])}}">{{$item->artist->title}}</a>
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
    {{--album tracks ends--}}

    {{--    similar tracks starts--}}
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">
        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">
                similar tracks
            </div>
            <div class="flex">
                <div class="group">
                    <button
                        class="flex flex-row px-4 sm:px-5 transition group-hover:bg-white group-hover:text-black duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                        <img class="h-4 mr-1 transition group-hover:brightness-0 group-hover:duration-300"
                             src="{{asset('/storage/icons/white-play.svg')}}" alt="_"/>
                        <div class="text-xs text-bold">play all</div>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full grid gap-4 md:grid-cols-2 lg:grid-cols-3 my-4">
            @foreach($similarTracks as $item)
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
                                  href="{{route('artistDetail', ['id' => $item->artist->id ."-". $item->artist->title])}}">{{$item->artist->title}}</a>
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
    {{--    similar tracks ends--}}

    <div class="my-4">
        <img class="cursor-pointer max-w-[82%] w-1/1 mx-auto rounded-lg" src="{{asset('/storage/apppromotebg.jpg')}}"
             alt="music">
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
                document.getElementById("textPlayer").textContent = "Pause";
                document.getElementById("imgClickAndChange").src = "{{ asset('/storage/icons/pause.svg') }}";

                fetch('/increment/' + <?php echo $track->id ?>)
                    .then(response => response.json())
                    .then(data => console.log(data));
            } else {
                event.pause();
                document.getElementById("textPlayer").textContent = "Play";
                document.getElementById("imgClickAndChange").src = "{{ asset('/storage/icons/white-play.svg') }}";
            }
        });
    </script>
    <script src="path/to/sharer.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/share.js') }}"></script>


@endsection
