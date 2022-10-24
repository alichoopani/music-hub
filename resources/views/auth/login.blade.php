@section('title', 'Log in')
@extends('layouts.index')
@section('content')
    <div class="max-w-[83%] sm:max-w-[67%] md:max-w-[50%] lg:max-w-[40%] mx-auto rounded-lg my-10">
        <div class="flex flex-col items-center shadow-light rounded-md">
            <div class="cursor-default text-4xl uppercase text-white font-bold my-6">login</div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>

            <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data" class="w-full md:w-2/3 flex flex-col items-center gap-y-4 px-4 md:px-0">
                @csrf
                <div class="w-full">
                    <x-input id="email" type="email" name="email" :value="old('email')" required class="w-full text-lg border-gray-300 py-2" placeholder="Mr.Tehran@gmail.com">
                    </x-input>
                </div>
                <div class="w-full">
                    <div class="flex justify-between items-center">
                        <a class="text-sm font-display font-semibold text-gray-500 hover:text-gray-300 cursor-pointer my-1">Forgot Password?</a>
                    </div>
                    <x-input id="password" type="password" name="password" required autocomplete="new-password"
                             class="w-full text-lg border-gray-300 focus:outline-none py-2"
                             placeholder="Enter your password">
                    </x-input>
                </div>

                <div class="cursor-default text-md font-display text-[#909090] text-center">
                    Dont have an account ?
                    <a href="{{ route('register') }}" class="cursor-pointer text-gray-500 hover:text-gray-300">Register</a>
                </div>

                <div class="max-w-[50%] pb-6">
                    <x-button class="mx-auto text-base bg-[#757575] text-white p-4 w-full justify-center rounded-lg tracking-wide font-display hover:brightness-50 shadow-lg">
                        {{ __('Login') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
@endsection
