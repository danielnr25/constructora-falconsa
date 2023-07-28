@props(['disabled' => false])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full pl-10 p-2 placeholder-gray-900 border border-gray-300 rounded-md focus:outline-primary focus:ring-2 focus:ring-primary focus:border-transparent']) !!}>
