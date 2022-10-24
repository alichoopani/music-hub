<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
{{--    <link rel="shortcut icon" href="/favicon.ico" />--}}

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css')}}" rel="stylesheet">
    <link href="{{asset('//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"')}}" rel="stylesheet" />
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css')}}" rel="stylesheet" integrity="sha512-9my9Mb2+0YO+I4PUCSwUYO7sEK21Y0STBAiFEYoWtd2VzLEZZ4QARDrZ30hdM1GlioHJ8o8cWQiy8IAb1hy/Hg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{--    <link href="{{asset('https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css')}}" rel="stylesheet"/>--}}
    @livewireStyles
    @livewireScripts
</head>
<body class="bg-[#202020]">
{{--header starts--}}
<header>
    <div class="w-full">
        <div class="h-16 w-48 mx-auto">
            <a href="{{route('home')}}"><img src="{{asset('/storage/logo.png')}}" alt="mrtehran"></a>
        </div>
    </div>
    <div class="flex whitespace-nowrap h-12 gap-1 w-full sm:max-w-[85%] max-w-[95%] mx-auto px-6 mb-4">
        <div class="flex-1 cursor-pointer rounded-l-lg bg-[#454545] brightness-75 hover:brightness-100 text-center flex items-center">
            <a href="{{route('home')}}" class="flex-1 h-full flex items-center justify-center text-white p-2">
                <img class="h-4" src="{{asset('/storage/icons/home.svg')}}" alt="_"/>
                <span class="ml-2 hidden lg:flex font-semibold">Home</span>
            </a>
        </div>
        <div class="flex-1 cursor-pointer bg-[#454545] brightness-75 hover:brightness-100 text-center flex items-center">
            <a href="{{route('browse')}}" class="flex-1 h-full flex items-center justify-center text-white p-2">
                <img class="h-4" src="{{asset('/storage/icons/browse.svg')}}" alt="_"/>
                <span class="ml-2 hidden lg:flex font-semibold">Browse</span>
            </a>
        </div>
        <div class="flex-1 cursor-pointer bg-[#454545] brightness-75 hover:brightness-100 text-center flex items-center">
            <a href="{{route('artist')}}" class="flex-1 h-full flex items-center justify-center text-white p-2">
                <img class="h-4" src="{{asset('/storage/icons/artist.svg')}}" alt="_"/>
                <span class="ml-2 hidden lg:flex font-semibold">Artists</span>
            </a>
        </div>
        <div class="flex-1 cursor-pointer bg-[#454545] brightness-75 hover:brightness-100 text-center flex items-center">
            <a href="{{route('album')}}" class="flex-1 h-full flex items-center justify-center text-white p-2">
                <img class="h-4" src="{{asset('/storage/icons/album.svg')}}" alt="_"/>
                <span class="ml-2 hidden lg:flex font-semibold">Albums</span>
            </a>
        </div>
        <div class="flex-1 cursor-pointer bg-[#454545] brightness-75 hover:brightness-100 text-center flex items-center">
            <a href="{{route('category')}}" class="flex-1 h-full flex items-center justify-center text-white p-2">
                <img class="h-4" src="{{asset('/storage/icons/playList.svg')}}" alt="_"/>
                <span class="ml-2 hidden lg:flex font-semibold">Categories</span>
            </a>
        </div>
        <div class="flex-1 cursor-pointer bg-[#454545] brightness-75 hover:brightness-100 text-center flex items-center">
            <a href="{{route('topCharts')}}" class="flex-1 h-full flex items-center justify-center text-white p-2">
                <img class="h-4" src="{{asset('/storage/icons/topChart.svg')}}" alt="_"/>
                <span class="ml-2 hidden lg:flex font-semibold">Top Charts</span>
            </a>
        </div>

        <div onclick="openNav()" class="flex-1 cursor-pointer bg-[#454545] brightness-75 hover:brightness-100 text-center flex items-center">
            <a class="flex-1 h-full flex items-center justify-center text-white p-2">
                <img class="h-4" src="{{asset('/storage/icons/search.svg')}}" alt="_"/>
                <span class="ml-2 hidden lg:flex font-semibold">Search</span>
            </a>
        </div>

        @if (Route::has('login'))
            @auth()
                <div class="flex-1 cursor-pointer bg-[#454545] brightness-75 hover:brightness-100 text-center flex items-center rounded-br-lg rounded-tr-lg">
                    <a href="{{route('dashboard')}}" class="flex-1 h-full flex items-center justify-center text-white p-2">
                        <img class="h-4" src="{{asset('/storage/icons/profile.svg')}}" alt="_"/>
                        <span class="ml-2 hidden lg:flex font-semibold">Profile</span>
                    </a>
                </div>
            @else
                @if(Route::has('register'))
                    <div class="flex-1 cursor-pointer bg-[#454545] brightness-75 hover:brightness-100 text-center flex items-center rounded-tr-lg rounded-br-lg">
                        <a href="{{route('register')}}" class="flex-1 h-full flex items-center justify-center text-white p-2">
                            <img class="h-4" src="{{asset('/storage/icons/login2.svg')}}" alt="_"/>
                            <span class="ml-2 hidden lg:flex font-semibold">Register</span>
                        </a>
                    </div>
                @endif
            @endauth
        @endif
    </div>

    <div class="w-full flex items-center justify-center">
        <div class="w-full md:max-w-[30%]">
            <div id="mySidenav" class="sidenav flex flex-col transition duration-150">
                <div class="w-full flex items-center">
                    @livewire('search')
                </div>
            </div>
        </div>
    </div>

</header>
{{--header ends--}}

@yield('content')

{{--footer starts--}}
<footer class="w-full flex flex-col">
    <div class="flex justify-center gap-3 h-full w-full">
        <a href="{{ route('appNotification') }}">
            <img class="cursor-pointer hover:opacity-60 " src="{{asset('/storage/get_it_on_app_store.png')}}" alt="app store">
        </a>
        <a href="{{ route('appNotification') }}">
            <img class="cursor-pointer hover:opacity-60 " src="{{asset('/storage/get_it_on_google_play.png')}}" alt="google play">
        </a>
    </div>
    <div class="w-full max-w-8xl gap-4 flex flex-wrap justify-center w-full my-4 text-center px-4">
        <div class="cursor-pointer hover:text-[#8F8F8F] capitalize text-white text-sm font-bold items-center">
            <a href="{{ route('appNotification') }}">applications</a>
        </div>
        <div class="cursor-pointer hover:text-[#8F8F8F] capitalize text-white text-sm font-bold items-center">instagram</div>
        <div class="cursor-pointer hover:text-[#8F8F8F] capitalize text-white text-sm font-bold items-center">
            <a href="{{route('contact')}}" > contact us </a>
        </div>
        <div class="cursor-pointer hover:text-[#8F8F8F] capitalize text-white text-sm font-bold items-center">
        <a href="{{route('faq')}}"> FAQ & Help</a>
        </div>
        <div class="cursor-pointer hover:text-[#8F8F8F] capitalize text-white text-sm font-bold items-center">
        <a href="{{route('privacy')}}">privacy policy</a>
        </div>
        <div class="cursor-pointer hover:text-[#8F8F8F] capitalize text-white text-sm font-bold items-center">
            <a href="{{route('termsOfServices')}}">terms of service</a>
        </div>
        <div class="cursor-pointer hover:text-[#8F8F8F] uppercase text-white text-sm font-bold items-center">
            <a href="{{route('dmca')}}">dmca</a>
        </div>
    </div>
</footer>
</body>
</html>
<script src="{{asset('https://unpkg.com/flowbite@1.4.7/dist/flowbite.js')}}"></script>
<script src="{{asset('../path/to/flowbite/dist/flowbite.js')}}"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").classList.add('show');
        document.getElementById('search').focus();
    }

    function closeNav() {
        document.getElementById("mySidenav").classList.remove('show');
    }
</script>
{{--footer ends--}}
