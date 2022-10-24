@section('title', 'Contact Us')
@extends('layouts.index')
@section('content')

    {{--    contact us image starts--}}
    <div class="w-full mx-auto mb-2">
        <div class="w-full flex flex-col relative">
            <img class="h-[20rem] object-cover w-full h-full absolute top-0 left-0 object-cover"
                 src="{{asset('storage/contactUs.jpg')}}" alt="_"/>
            <div class="w-full h-[20rem] flex flex-col justify-center gap-2 pb-8 z-20 bg-gradient-to-t from-[#202020]">
                <div class="capitalize text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-white cursor-default ml-28">contact us</div>
            </div>
        </div>
    </div>
    {{--    contact us image ends--}}

    <div class="flex flex-col mx-auto max-w-[85%]">
        <div class="flex gap-4 mx-auto text-center mx-auto flex-col md:flex-row mb-4">
            <div class="flex md:flex-col gap-10 w-full mx-auto">
                <div class="w-full mx-auto text-gray-300 cursor-default">
                    Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.
                </div>
            </div>

            <div class="my-auto mx-auto">
                <div class="w-[22rem] lg:w-[30rem] cursor-default">
{{--                    <form class="bg-[#343434] shadow-lg rounded-lg px-8">--}}
                        {{--                        <input class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
                        {{--                            id="message" type="text" placeholder="Your Message">--}}
                        @livewire('contact-us')
{{--                    </form>--}}
                    <div class="w-full flex">
                        {{--                        <button class="flex mx-auto mt-2 bg-[#303030] hover:brightness-150 text-white--}}
                        {{--                        font-bold py-2 px-4 border border-gray-700 rounded">--}}
                        {{--                            Send--}}
                        {{--                        </button>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
