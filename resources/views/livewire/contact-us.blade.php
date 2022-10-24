0<div class="">
    <div class="flex flex-col">
        @auth()

            <form wire:submit.prevent="submit" method="POST">
                @csrf
                @error('createContact')<span class="text-red-600">{{$message}}</span> @enderror
                <div class="mt-14 mb-4 relative group">
                    <input wire:model="createContact" type="text" placeholder="Write your Word!"
                              class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-nonefocus:shadow-outlinemx-8 contactInput" />
                    <x-button type="submit" class="mt-4 max-w-[40%] contactButton mx-auto text-xl bg-[#202020]text-gray-300 hover:text-gray-200 p-4 w-full justify-center rounded-lg tracking-wide
                                font-display focus:outline-none focus:shadow-outline hover:bg-gray-400 hover:text-[#202020] font-bold shadow-lg" >submit</x-button>
                </div>
                @if(session()->has('message'))
                    <div class="text-gray-100">{{session('message')}}</div>
                @endif
            </form>

        @else
            <div class="mt-4 text-gray-100">
                <span>You have to <a href="{{route('login')}}" class="text-red-600">Login</a> Or
                    <a href="{{route('register')}}" class="text-red-600"> Register</a> first!
                </span>
            </div>
        @endif
    </div>
</div>
