@section('home', 'index')
@extends('layout.app')
@section('content')
    {{-- first flex starts--}}
    <div class="max-w-[81%] py-2 mx-auto">
        <div class="flex flex-wrap">
            <div class="w-full sm:w-1/2 md:w-1/4">
                <img class="cursor-pointer hover:opacity-60 object-cover w-full aspect-square transition-opacity"
                     src="{{asset('/storage/6492732.jpg')}}"
                     alt="music">
                <div class="mx-4 sm:mx-6 lg:mx-10 my-5 font-semibold text-white">
                    <span
                        class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug whitespace-nowrap">Kooh</span>
                    <div class="flex">
                        <div class="font-lg text-sm whitespace-nowrap">Track by</div>
                        <div class="pl-1 text-[#909090] font-semibold text-sm">
                            <span class="hover:underline cursor-pointer whitespace-nowrap"> Saman jalili</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/4">
                <img class="cursor-pointer hover:opacity-60 object-cover w-full aspect-square"
                     src="{{asset('/storage/6492723.webp')}}" alt="music">
                <div class="mx-4 sm:mx-6 lg:mx-10 my-5 font-semibold text-white">
                    <span
                        class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug whitespace-nowrap">Kooh</span>
                    <div class="flex">
                        <div class="font-lg text-sm whitespace-nowrap">Track by</div>
                        <div class="pl-1 text-[#909090] text-sm">
                            <span class="hover:underline cursor-pointer whitespace-nowrap"> Saman jalili</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/4">
                <img class="cursor-pointer hover:opacity-60 object-cover w-full aspect-square"
                     src="{{asset('/storage/1ea6ed4a41cb1c97dea93d15ddee11f2.jpg')}}"
                     alt="music">
                <div class="mx-4 sm:mx-6 lg:mx-10 my-5 font-semibold text-white">
                    <span
                        class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug whitespace-nowrap">Kooh</span>
                    <div class="flex">
                        <div class="font-lg text-sm whitespace-nowrap">Track by</div>
                        <div class="pl-1 text-[#909090] text-sm">
                            <span class="hover:underline cursor-pointer whitespace-nowrap"> Saman jalili</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-1/2 md:w-1/4">
                <img class="cursor-pointer hover:opacity-60 object-cover w-full aspect-square"
                     src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                     alt="music">
                <div class="mx-4 sm:mx-6 lg:mx-10 my-5 font-semibold text-white">
                    <span
                        class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug whitespace-nowrap">Kooh</span>
                    <div class="flex">
                        <div class="font-lg text-sm whitespace-nowrap">Track by</div>
                        <div class="pl-1 text-[#909090] text-sm">
                            <span class="hover:underline cursor-pointer whitespace-nowrap"> Saman jalili</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--first flex ends--}}

    {{--exclusive playlists starts--}}
    <div class="sm:max-w-[82%] max-w-[95%] mx-auto py-6">
        <div class="flex items-center justify-between px-2 gap-4 flex-wrap">
            <div class="uppercase text-white text-lg sm:text-2xl md:text-3xl lg:text-4xl font-extrabold cursor-default">
                exclusive playlists
            </div>
        </div>
        <div class="w-full grid gap-4 md:grid-cols-2 md:grid-rows-4 lg:grid-cols-3 lg:grid-rows-4 my-4">
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/6492732.jpg')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/6492732.jpg')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/6492732.jpg')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/6492732.jpg')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/6492732.jpg')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/6492732.jpg')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/6492732.jpg')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/6492732.jpg')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/6492732.jpg')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/6492732.jpg')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/6492732.jpg')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/425-4259035_sunflower-clipart-black-and-white-black-and-white.png')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
            <div class="bg-[#303030] flex rounded-md">
                <img
                    class="cursor-pointer hover:opacity-60 h-6 min-h-full rounded-l-md aspect-square object-cover flex-shrink-0"
                    src="{{asset('/storage/6492732.jpg')}}"
                    alt="music">
                <div
                    class="w-full flex flex-col justify-center text-white capitalize pl-6 pr-4 py-3 text-base font-semibold min-h-[6rem]">
                        <span
                            class="hover:text-[#909090] cursor-pointer paragraph-ellipsis-2 leading-snug">belakhare</span>
                    <div class=" capitalize text-sm text-[#989896] font-semibold">
                        <span class="hover:underline cursor-pointer">majid razavi</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--exclusive playlists ends--}}

    <div class="my-4">
        <img class="cursor-pointer max-w-[82%] w-1/1 mx-auto rounded-lg" src="{{asset('/storage/apppromotebg.jpg')}}"
             alt="music">
    </div>
@endsection
