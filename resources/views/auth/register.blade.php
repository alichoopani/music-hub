@section('title', 'Register')
@extends('layouts.index')
@section('content')
    <div class="max-w-[83%] sm:max-w-[67%] md:max-w-[50%] lg:max-w-[40%] mx-auto rounded-lg my-10">
        <div class="flex flex-col items-center shadow-light rounded-md">
            <div class="cursor-default text-4xl uppercase text-white font-bold my-6">register</div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="w-full md:w-2/3 flex flex-col items-center gap-y-4 px-4 md:px-0">
                @csrf
                         <x-input id="name" type="text" name="name" :value="old('name')" required autofocus class="w-full text-lg border-b border-gray-300" placeholder="Enter Your Name">
                        </x-input>
                <x-input id="username" type="text" name="username" :value="old('username')" required autofocus
                         class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none"
                         placeholder="Enter Your Username">
                </x-input>
                        <x-input id="email" type="email" name="email" :value="old('email')" required class="w-full text-lg border-gray-300" placeholder="Mr.Tehran@gmail.com">
                        </x-input>

                        <x-input id="password" type="password" name="password" required autocomplete="new-password" class="w-full text-lg border-gray-300 focus:outline-none py-2" placeholder="Enter your password">
                        </x-input>
                <x-input id="password_confirmation" type="password" name="password_confirmation" required class="w-full text-lg py-2 border-b border-gray-300 focus:outline-none" placeholder="Confirm your password">
                </x-input>
                <div class="w-full">
                    <x-label for="avatar" :value="__('Avatar')"
                             class="cursor-default text-lg font-bold text-[#909090] tracking-wide">Avatar
                    </x-label>
                    <x-input id="avatar" type="file" name="avatar" :value="old('avatar')" required
                             class="w-full text-lg py-2 focus:outline-none"
                             placeholder="Enter Your Avatar"></x-input>
                </div>
                    <div class="cursor-default text-md font-display text-[#909090] text-center">
                        Do you have account ?
                        <a href="{{ route('login') }}" class="cursor-pointer text-gray-500 hover:text-gray-300">Login</a>
                    </div>

                    <div class="max-w-[50%] pb-6">
                        <x-button class="mx-auto text-base bg-[#757575] text-white p-4 w-full justify-center rounded-lg tracking-wide font-display hover:brightness-50 shadow-lg">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
