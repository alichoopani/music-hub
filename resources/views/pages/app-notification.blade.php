@section('title', 'App')
@extends('layouts.index')
@section('content')

    <div class="max-w-[59%] mx-auto my-12 sm:max-w-[41%]">
        <div class="w-full">
            <div class="grid rounded-md w-full h-[21rem] bg-gradient-to-r from-[#F9355D] to-[#C128EF]">
                <img class="cursor-default w-1/1 mx-auto rounded-t-lg"
                     src="{{asset('/storage/apppromotebg.jpg')}}" alt="music">
                <div class="flex flex-col w-full font-semibold pb-10">
                    <div class="flex flex-col my-2 mx-8">
                        <div class="text-sm text-white font-bold cursor-default">
                            To like your favorite songs, you need to install
                            the MrTehran app. The MrTehran app includes a variety of features that you will enjoy. Click
                            the button and install the app on your phone.
                        </div>
                    </div>
                    <div class="flex flex-wrap gap-1 sm:gap-2 mx-auto my-2">
                        <div class="group">
                            <button class="flex flex-row px-4 transition group-hover:bg-white group-hover:text-black
                                 duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                                <img class="h-4 mr-2 transition group-hover:brightness-0 group-hover:duration-300"
                                     src="{{asset('/storage/icons/tablet.svg')}}" alt="_"/>
                                <div class="text-xs font-bold">install app</div>
                            </button>
                        </div>
                        <div class="group">
                            <a href="#" onclick="javascript:window.history.back(-1);return false;">
                                <button class="flex flex-row px-4 sm:px-6 transition group-hover:bg-white group-hover:text-black
                                duration-300 rounded-full capitalize border border-white py-2 text-white font-semibold text-sm">
                                    <div class="text-xs font-bold">close</div>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
