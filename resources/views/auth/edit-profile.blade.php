@section('title', 'Edit Profile')
@extends('layouts.index')
@section('content')
    <div class="max-w-[83%] sm:max-w-[67%] md:max-w-[50%] lg:max-w-[40%] mx-auto rounded-lg my-10">
        <div class="flex flex-col items-center shadow-light rounded-md">
            <div class="w-full flex flex-col items-center p-2">
                <div>
                    <img class="h-[12rem] w-[12rem] rounded-full my-4" src="{{ asset('storage/' . $profile->avatar) }}">
                </div>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors"/>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul> @foreach ($errors->all() as $error)@endforeach </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('editProfile') }}" enctype="multipart/form-data" class="w-full md:w-2/3 flex flex-col items-center gap-y-4 px-4 md:px-0">
                @csrf
                <x-input id="username" type="text" name="username" :value="old('username')" autofocus
                         class="mb-2 w-full text-lg py-2 border-b border-gray-300 focus:outline-none"
                         placeholder="Enter Your Username      ({{ $profile->username }})">
                </x-input>
                <div class="w-full">
                    <x-input id="email" type="email" name="email" :value="old('email')" class="w-full text-lg border-gray-300 py-2" placeholder="{{ $profile->email }}">
                    </x-input>
                </div>

                <div class="w-full">
                    <x-label for="avatar" :value="__('Avatar')"
                             class="cursor-default text-lg font-bold text-[#909090] tracking-wide">Avatar
                    </x-label>
                    <x-input id="avatar" type="file" name="avatar" :value="old('avatar')"
                             class="w-full text-lg py-2 focus:outline-none"
                             placeholder="Enter Your Avatar">

                    </x-input>
                </div>

                <div class="max-w-[50%] pb-6">
                    <x-button class="mx-auto text-base bg-[#757575] text-white p-4 w-full justify-center rounded-lg tracking-wide font-display hover:brightness-50 shadow-lg">
                        {{ __('Save') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
@endsection

