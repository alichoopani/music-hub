@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'placeholder-[#909090] text-white bg-[#202020] rounded-lg border border-gray-500 focus:border-gray-500 focus:ring-gray-300 focus:ring-opacity-50']) !!}>
